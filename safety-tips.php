<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Safety Tips - SMC Ltd</title>
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

  <!-- Safety Tips Section -->
  <main>
    <section class="safety-tips">
      <div class="container">
        <h2>Essential Safety Tips for Social Media</h2>
        <p>Social media offers great opportunities to connect, learn, and share, but it’s important to stay safe while
          doing so. These tips will help you navigate social media platforms more securely.</p>

        <h3>1. Protect Your Personal Information</h3>
        <p>Be cautious about the personal information you share online. Avoid posting your address, phone number, or
          other sensitive details on public profiles.</p>

        <h3>2. Strengthen Your Privacy Settings</h3>
        <p>Ensure that your social media accounts are set to private so only your trusted friends and followers can see
          your posts. Regularly check and update your privacy settings to limit the amount of personal data exposed.</p>

        <h3>3. Use Strong Passwords</h3>
        <p>Create strong, unique passwords for your social media accounts, and enable two-factor authentication (2FA)
          where available. Avoid using the same password for multiple platforms.</p>

        <h3>4. Be Wary of Strangers</h3>
        <p>Be cautious when accepting friend requests or messages from people you don’t know. Scammers and cyberbullies
          often use fake accounts to target individuals.</p>

        <h3>5. Report Inappropriate Content</h3>
        <p>If you encounter cyberbullying, hate speech, or any inappropriate content, report it to the platform
          immediately. Social media companies have policies in place to handle these issues.</p>

        <h3>6. Limit Your Screen Time</h3>
        <p>Set boundaries for how much time you spend on social media. Taking regular breaks helps prevent social media
          addiction and reduces negative impacts on mental health.</p>

        <h3>7. Think Before You Post</h3>
        <p>Remember that what you share online can be permanent. Before posting, think about the potential consequences.
          Avoid sharing impulsive or harmful content.</p>

        <h3>8. Stay Informed</h3>
        <p>Stay updated on the latest trends and risks in social media to keep yourself and your online presence safe.
          Follow reliable sources to stay informed about new scams, privacy policies, and social media practices.</p>
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