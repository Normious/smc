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
    <title>Privacy Policy - SMC Ltd</title>
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

    <!-- Privacy Policy Section -->
    <main>
        <section class="privacy-policy">
            <div class="container">
                <h2>Privacy Policy</h2>
                <p>At SMC Ltd, we are committed to protecting your privacy. This privacy policy outlines how we collect, use, and safeguard your personal information when you use our website.</p>

                <h3>1. Information We Collect</h3>
                <p>We may collect the following types of information from you:</p>
                <ul>
                    <li><strong>Personal Information:</strong> When you fill out a form, subscribe to our newsletter, or send us a message, we may collect your name, email address, and other contact details.</li>
                    <li><strong>Usage Data:</strong> We may collect information about how you use our website, such as your IP address, browser type, and pages visited.</li>
                </ul>

                <h3>2. How We Use Your Information</h3>
                <p>We use the information we collect to:</p>
                <ul>
                    <li>Respond to your inquiries and provide support.</li>
                    <li>Improve our website and services based on user feedback and analytics.</li>
                    <li>Send you updates and promotional material (only if you have opted in).</li>
                </ul>

                <h3>3. Data Security</h3>
                <p>We take appropriate measures to ensure the security of your personal information. However, no method of transmission over the internet is 100% secure, and we cannot guarantee absolute security.</p>

                <h3>4. Sharing Your Information</h3>
                <p>We do not sell, trade, or rent your personal information to third parties. We may share information with trusted service providers who assist us in running our website, provided they agree to keep the information confidential.</p>

                <h3>5. Cookies</h3>
                <p>We use cookies to enhance your experience on our website. You can choose to disable cookies in your browser settings, but this may limit your ability to use certain features of our site.</p>

                <h3>6. Your Rights</h3>
                <p>You have the right to access, update, or delete your personal information at any time. If you wish to exercise these rights, please contact us through our <a href="contact.html">Contact Page</a>.</p>

                <h3>7. Changes to This Policy</h3>
                <p>We reserve the right to update this privacy policy at any time. Any changes will be posted on this page, and we encourage you to review it regularly.</p>

                <h3>8. Contact Us</h3>
                <p>If you have any questions or concerns about this privacy policy, please contact us at <a href="mailto:support@smccampaign.com">support@smccampaign.com</a>.</p>
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
