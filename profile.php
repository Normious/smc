<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
    header("Location: login-signup.php");
    exit();
}

require 'config.php'; // Include the database connection

// Handle updating user credentials
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_credentials') {
    $new_username = htmlspecialchars(trim($_POST['new_username']));
    $new_password = password_hash(trim($_POST['new_password']), PASSWORD_DEFAULT);

    // Update credentials in the database
    $stmt = $conn->prepare("UPDATE users SET name = ?, password = ? WHERE id = ?");
    $stmt->bind_param("ssi", $new_username, $new_password, $_SESSION['user_id']); // Use user_id
    $stmt->execute();

    // Update session username after the change
    $_SESSION['username'] = $new_username;

    // Redirect to avoid form resubmission
    header("Location: profile.php?update=success");
    exit();
}

// Handle deleting the user account and related records
if (isset($_POST['action']) && $_POST['action'] === 'delete_account') {
    // Delete user records first
    $stmt = $conn->prepare("DELETE FROM records WHERE user_id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();

    // Delete user account
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();

    // Log the user out after deleting the account
    session_destroy();
    header("Location: auth.html?account_deleted=true");
    exit();
}

// Handle creating a new record
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] === 'create') {
    $record_name = htmlspecialchars(trim($_POST['record_name']));

    // Insert the new record into the database
    $stmt = $conn->prepare("INSERT INTO records (user_id, record_name) VALUES (?, ?)");
    $stmt->bind_param("is", $_SESSION['user_id'], $record_name);
    $stmt->execute();

    // Redirect to avoid form resubmission
    header("Location: profile.php");
    exit();
}

// Handle deleting a record
if (isset($_GET['delete'])) {
    $record_id = $_GET['delete'];

    // Delete the record from the database
    $stmt = $conn->prepare("DELETE FROM records WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $record_id, $_SESSION['user_id']);
    $stmt->execute();

    // Redirect back to profile page
    header("Location: profile.php");
    exit();
}

// Fetch all records for the logged-in user
$stmt = $conn->prepare("SELECT * FROM records WHERE user_id = ?");
$stmt->bind_param("i", $_SESSION['user_id']); // Bind the user_id
$stmt->execute();
$result = $stmt->get_result(); // Get the result set

$records = [];
while ($row = $result->fetch_assoc()) {
    $records[] = $row; // Add each row to the records array
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="styles.css">
  <script defer src="script.js"></script>
</head>

<body>
   <!-- Header -->
   <header>
    <div class="logo">
      <h1>SMC Ltd</h1>
    </div>
    <div class="menu-btn actives"></div>
    <div class="navigation active">
      <div class="navigation-item">
        <a href="home.php">Home</a>
        <br /><br />
        <div class="dropdown">
          <a href="#" class="dropdown-toggle">Information </a>
          <ul class="dropdown-menu">
            <li><a href="campaign-aims.php">Campaign Aims</a></li>
            <li><a href="safety-tips.php">Safety Tips</a></li>
          </ul>
        </div>
        <br /><br />
        <a href="apps.php">Apps</a>
        <br /><br />
        <div class="dropdown">
          <a href="#" class="dropdown-toggle">Parents </a>
          <ul class="dropdown-menu">
            <li><a href="help-for-parents.php">Help for Parents</a></li>
            <li><a href="parent-resources.php">Parent Resources</a></li>
          </ul>
        </div>
        <br /><br />
        <a href="livestreaming.php">Livestreaming</a>
        <a href="contact-us.php">Contact Us</a>
        <a href="legislation-guidance.php">Legislation</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
        <br /><br />
      </div>
    </div>
  </header>

  <br />
  <br />
  <br />
  <br />

  <!-- Profile Section -->
  <section class="profile">
    <h1>Welcome to your Profile, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

    <!-- Update Credentials Form -->
    <div class="update-credentials">
      <h3>Update Your Credentials</h3>
      <form action="profile.php" method="POST">
        <input type="hidden" name="action" value="update_credentials">
        <input type="text" name="new_username" placeholder="New Username" required>
        <input type="password" name="new_password" placeholder="New Password" required>
        <button type="submit" class="btn">Update Credentials</button>
      </form>
      <?php if (isset($_GET['update']) && $_GET['update'] == 'success'): ?>
      <p class="success-message">Your credentials have been updated successfully.</p>
      <?php endif; ?>
    </div>


    <!-- Create Record Form -->
    <div class="create-record">
      <h3>Create a New Record</h3>
      <form action="profile.php" method="POST">
        <input type="hidden" name="action" value="create" class="inputpro">
        <input type="text" name="record_name" placeholder="Record Name" required class="inputpro">
        <button type="submit" class="btn">Create Record</button>
      </form>
    </div>

    <!-- Display User Records -->
    <h3>Your Records</h3>
    <table class="records-table">
      <thead>
        <tr>
          <th>Record ID</th>
          <th>Record Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($records as $record): ?>
        <tr>
          <td><?php echo $record['id']; ?></td>
          <td><?php echo htmlspecialchars($record['record_name']); ?></td>
          <td>
            <a href="profile.php?delete=<?php echo $record['id']; ?>" class="btn-delete"
              onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Delete Account -->
    <div class="delete-account">
      <h3>Delete Your Account</h3>
      <form action="profile.php" method="POST">
        <input type="hidden" name="action" value="delete_account">
        <button type="submit" class="btn-delete"
          onclick="return confirm('Are you sure you want to delete your account? This cannot be undone.');">Delete
          Account</button>
      </form>
    </div>
  </section>
     <!-- Footer -->
     <footer>
  <div class="footer-socials">
    <a href="https://www.facebook.com/"><img src="images/facebook.png" alt="Facebook" /></a>
    <a href="https://www.x.com"><img src="images/twitter.png" alt="Twitter" /></a>
    <a href="https://www.instagram.com"><img src="images/instagram.png" alt="Instagram" /></a>
  </div>
  <p>&copy; 2024 SMC Ltd. 
    You Are Here: 
    <?php
      $currentPage = basename($_SERVER['REQUEST_URI']);
      switch ($currentPage) {
        case 'home.php':
          echo 'Home';
          break;
        case 'campaign-aims.php':
          echo 'Campaign Aims';
          break;
        case 'safety-tips.php':
          echo 'Safety Tips';
          break;
        case 'apps.php':
          echo 'Apps';
          break;
        case 'parent-resources.php':
          echo 'Parent Resources';
          break;
        case 'help-for-parents.php':
          echo 'Help for Parents';
          break;
        case 'livestreaming.php':
          echo 'Livestreaming';
          break;
        case 'contact-us.php':
          echo 'Contact Us';
          break;
        case 'legislation-guidance.php':
          echo 'Legislation';
          break;
        case 'profile.php':
          echo 'Profile';
          break;
        case 'login-signup.php':
          echo 'Login/Signup';
          break;
        default:
          echo $currentPage;
      }
    ?>
  </p>
</footer>
</body>

</html>