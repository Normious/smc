<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['user_id'])) {
    header("Location: login-signup.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parent Resources - SMC Ltd</title>
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
        <?php if (isset($_SESSION['username'])): ?>
        <a href="profile.php">Profile</a>
        <?php else: ?>
        <a href="login-signup.php">Login/Signup</a>
        <?php endif; ?>
        <br /><br />
      </div>
    </div>
  </header>

  <br />
  <br />

    <!-- Parent Resources Section -->
    <main>
        <section class="parent-resources">
            <div class="container">
                <h2>Resources for Parents</h2>
                <p>These resources provide valuable information to help parents guide their teens in using social media safely and responsibly:</p>

                <ul class="resource-links">
                    <li><a href="https://www.nspcc.org.uk/keeping-children-safe/online-safety/">NSPCC - Online Safety</a></li>
                    <li><a href="https://www.connectsafely.org/">ConnectSafely - Social Media Safety</a></li>
                    <li><a href="https://www.cyberwise.org/">Cyberwise - Digital Parenting</a></li>
                    <li><a href="https://www.commonsensemedia.org/">Common Sense Media - Family Tech</a></li>
                    <li><a href="https://www.bark.us/">Bark - Parental Control App</a></li>
                    <li><a href="https://www.norton.com/internetsecurity-kids-safety-social-networking-safety.html">Norton - Social Networking Safety</a></li>
                </ul>

                <p>These tools and articles will help you better understand the online world your teen navigates, and provide practical tips on how to protect them.</p>
            </div>
        </section>
    </main>

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
