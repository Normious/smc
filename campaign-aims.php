<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Campaign Aims - SMC Ltd</title>
  <link rel="stylesheet" href="styles.css"> <!-- Link your CSS file here -->
  <script defer src="script.js"></script> <!-- Link your JS file here -->
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

  <!-- Campaign Aims Section -->
  <main>
    <section class="campaign-aims">
      <div class="container">
        <h2>Our Social Media Campaign Aims</h2>
        <p>At SMC Ltd, our mission is to promote the safe and responsible use of social media among teenagers. We
          are dedicated to ensuring that young people are aware of the potential risks associated with social media,
          including privacy breaches, cyberbullying, and mental health challenges.</p>

        <h3>Our Key Objectives:</h3>
        <ul>
          <li><strong>Online Safety Education:</strong> We aim to raise awareness about the importance of online safety,
            teaching teenagers how to protect their personal information and navigate social media responsibly.</li>
          <li><strong>Combatting Cyberbullying:</strong> Our campaigns focus on educating young people about the dangers
            of cyberbullying and providing resources to report and avoid online harassment.</li>
          <li><strong>Privacy and Data Protection:</strong> We help teens understand the significance of privacy
            settings and teach them how to safeguard their data from misuse.</li>
          <li><strong>Mental Health Support:</strong> By addressing the impacts of social media on mental health, we
            encourage balanced social media use and provide support for those struggling with social media addiction.
          </li>
          <li><strong>Promoting Positive Digital Citizenship:</strong> We foster a culture of respect and responsibility
            online, encouraging teenagers to engage in respectful and supportive digital interactions.</li>
        </ul>

        <h3>Our Vision for the Future:</h3>
        <p>We envision a future where teenagers are empowered to use social media safely and confidently. Our goal is to
          create a supportive community where young people can enjoy the benefits of social media without falling victim
          to its risks. Through education, resources, and peer support, we aim to make social media a safer space for
          all.</p>

        <h3>Our Social Media Campaigns:</h3>
        <p>To achieve our goals, we have launched several targeted campaigns:</p>
        <ul>
          <li><strong>#SafeTeensOnline:</strong> This campaign focuses on educating teens about the importance of
            privacy and digital safety through engaging content on popular social platforms.</li>
          <li><strong>#NoMoreCyberbullying:</strong> Aimed at combating online harassment, this campaign raises
            awareness about cyberbullying and provides resources for reporting and preventing it.</li>
          <li><strong>#DigitalWellness:</strong> This campaign encourages teens to maintain a healthy balance between
            social media use and offline activities, with a focus on mental well-being.</li>
        </ul>
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