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
  <title>Social Media Apps - SMC Ltd</title>
  <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
  <script defer src="script.js"></script> <!-- Link to your JS file -->
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

  <main>
    <section class="security-apps">
      <div class="container">
        <h2>Search for the latest safety techniques below.</h2>
        <!-- Responsive Search Bar -->
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Search for safety techniques..."
              onkeyup="searchDatabase()" />
        </div>
        <br><br><br><br><br>
        <!-- Search Results -->
        <div id="search-results">
          <!-- Search results will be displayed here -->
        </div>
      </div>
    </section>

  <!-- Social Media Apps Section -->
    <section class="social-media-apps">
      <div class="container">
        <h2>Popular Social Media Apps</h2>
        <p>Social media platforms are a great way to connect with friends, share ideas, and express yourself. However,
          it’s important to stay safe while using these platforms. Below are some of the most popular apps and tips to
          help you use them responsibly.</p>

        <div class="app-list">
          <div class="app-item">
            <img src="images/facebook.png" alt="Facebook Logo">
            <h3>Facebook</h3>
            <p>Facebook is one of the largest social media platforms. Be sure to adjust your privacy settings, limit who
              can see your posts, and avoid accepting friend requests from strangers.</p>
          </div>
          <div class="app-item">
            <img src="images/instagram.png" alt="Instagram Logo">
            <h3>Instagram</h3>
            <p>Instagram is popular for sharing photos and videos. Use private accounts to control who can follow you,
              and be mindful of the content you share. Be cautious of direct messages from unknown users.</p>
          </div>
          <div class="app-item">
            <img src="images/snapchat.png" alt="Snapchat Logo">
            <h3>Snapchat</h3>
            <p>Snapchat allows you to share disappearing photos and videos. Be aware that screenshots can still be
              taken. Always think before sharing, and avoid sharing personal details.</p>
          </div>
          <div class="app-item">
            <img src="images/tiktok.png" alt="TikTok Logo">
            <h3>TikTok</h3>
            <p>TikTok is a video-sharing app with millions of users. Make sure to adjust your privacy settings to
              control who can see your videos, and avoid sharing location information or other sensitive details.</p>
          </div>
          <div class="app-item">
            <img src="images/twitter.png" alt="Twitter Logo">
            <h3>Twitter</h3>
            <p>Twitter is a platform for sharing short messages. Be mindful of what you tweet, as tweets can spread
              quickly. Use privacy settings to limit who can interact with your posts.</p>
          </div>
        </div>
      </div>
    </section>
    <section class="security-apps">
      <div class="container">
        <h2>Recommended Security Apps for Safe Social Media Use</h2>
        <p>Staying safe online involves more than just using privacy settings on social media platforms. These security
          apps can help you protect your information, manage your online identity, and enhance your security while using
          social media.</p>

        <div class="app-list">
          <div class="app-item">
            <img src="images/norton.png" alt="Norton Security Logo">
            <h3>Norton Mobile Security</h3>
            <p>Norton offers comprehensive protection against malware, phishing attacks, and other threats. It's a great
              choice for teenagers who want to ensure their devices are secure while browsing the web or using social
              media apps.</p>
          </div>
          <div class="app-item">
            <img src="images/lastpass.png" alt="LastPass Logo">
            <h3>LastPass</h3>
            <p>LastPass is a password manager that helps you generate and store strong passwords securely. Use it to
              manage passwords for your social media accounts and other online services, ensuring your accounts stay
              protected.</p>
          </div>
          <div class="app-item">
            <img src="images/mcafee.png" alt="McAfee Logo">
            <h3>McAfee Mobile Security</h3>
            <p>McAfee provides device security, anti-theft protection, and safe browsing features. It's an excellent app
              for preventing cyberattacks and keeping your device secure while using social media platforms.</p>
          </div>
          <div class="app-item">
            <img src="images/expressvpn.png" alt="ExpressVPN Logo">
            <h3>ExpressVPN</h3>
            <p>ExpressVPN helps protect your online privacy by masking your IP address and encrypting your internet
              connection. It's especially useful when accessing social media apps over public Wi-Fi networks.</p>
          </div>
          <div class="app-item">
            <img src="images/Bark.jpg" alt="Bark Logo">
            <h3>Bark</h3>
            <p>Bark is a parental control app designed to monitor social media activity and alert parents of potential
              safety issues. It helps ensure safe and responsible social media use among teenagers.</p>
          </div>
        </div>
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