<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>SMC Ltd | Home</title>
  <link rel="stylesheet" href="styles.css" />
  <script defer src="script.js"></script>
</head>

<body class="custom-cursor">
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



  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-text">
      <h2>Welcome to the SMC Ltd</h2>
      <?php if (isset($_SESSION['username'])): ?>
      <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>! <a href="profile.php">Go to your profile</a>.
      </p>
      <?php else: ?>
      <p><a href="login-signup.php">Login</a> or <a href="login-signup.php">Sign Up</a> to access more features.</p>
      <?php endif; ?>
      <h2>Stay Safe Online</h2>
      <p>Discover the best practices to keep teens safe on social media.</p>
      <button class="cta-btn">Learn More</button>
    </div>
    <div class="hero-image">
      <img src="images/hero-social.png" alt="Social Media Safety" />
    </div>
  </section>

  <!-- How to Stay Safe Section -->
  <section class="stay-safe">
    <h3>How to Stay Safe Online</h3>
    <div class="tips">
      <div class="tip">
        <img src="images/icon-privacy.png" alt="Privacy Icon" />
        <p>Manage Your Privacy Settings</p>
      </div>
      <div class="tip">
        <img src="images/icon-password.png" alt="Password Icon" />
        <p>Use Strong Passwords</p>
      </div>
      <div class="tip">
        <img src="images/icon-friends.png" alt="Friends Icon" />
        <p>Be Careful with Friends Requests</p>
      </div>
    </div>
  </section>
  <br>
  <!-- Popular Social Media Section -->
  <h3>Most Popular Social Media Apps</h3>
  <section class="popular-apps">
    <div class="app-logos">
      <div class="parent">
        <div class="card">
          <div class="content-box">
            <span class="card-title">Facebook</span>
            <p class="card-content">
              Facebook is a social networking service that allows users to share updates, photos, and videos with friends and followers.
            </p>
            <span class="see-more">See More</span>
          </div>
          <div class="d-socials">
            <img src="images/facebook.png" alt="Facebook" />
          </div>
        </div>
      </div>
    </div>
    <div class="parent">
      <div class="card">
        <div class="content-box">
          <span class="card-title">Twitter</span>
          <p class="card-content">
            Twitter is a social networking service that allows users to share short messages (called "tweets") with their followers.
          </p>
          <span class="see-more">See More</span>
        </div>
        <div class="d-socials">
          <img src="images/twitter.png" alt="Twitter" />
        </div>
      </div>
    </div>
    </div>
    <div class="parent">
      <div class="card">
        <div class="content-box">
          <span class="card-title">Instagram</span>
          <p class="card-content">
            Instagram is a social networking service that allows users to share photos and videos with their followers.
          </p>
          <span class="see-more">See More</span>
        </div>
        <div class="d-socials">
          <img src="images/instagram.png" alt="Instagram" />
        </div>
      </div>
    </div>
    </div>
    <div class="parent">
      <div class="card">
        <div class="content-box">
          <span class="card-title">Snapchat</span>
          <p class="card-content">
            Snapchat is a social networking service that allows users to send photos and videos that disappear after a maximum of 10 seconds.
          </p>
         <span class="see-more">See More</span>
        </div>
        <div class="d-socials">
          <img src="images/snapchat.png" alt="Snapchat" />
        </div>
      </div>
    </div>
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

  <!-- Popup Notification -->
  <?php if (isset($_GET['signup']) && $_GET['signup'] == 'success'): ?>
  <div class="popup" id="popup">Signup Successful!</div>
  <?php elseif (isset($_GET['login']) && $_GET['login'] == 'success'): ?>
  <div class="popup" id="popup">Login Successful!</div>
  <?php endif; ?>

  <script>
  // Show popup and auto-hide after 3 seconds
  document.addEventListener("DOMContentLoaded", function() {
    const popup = document.getElementById("popup");
    if (popup) {
      popup.style.display = "block";
      setTimeout(() => {
        popup.style.opacity = "0";
        setTimeout(() => {
          popup.style.display = "none";
        }, 1000);
      }, 3000);
    }
  });
  </script>
</body>

</html>