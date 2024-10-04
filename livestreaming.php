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
    <title>Livestreaming - SMC Ltd</title>
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

    <!-- Livestreaming Section -->
    <main>
        <section class="livestreaming">
            <div class="container">
                <h2>Livestreaming: How to Stay Safe</h2>
                <p>Livestreaming allows teens to connect with their audience in real-time, share their talents, or simply hang out with friends. However, it also comes with potential risks. Here’s how teens can livestream in a safe environment:</p>

                <ul class="livestream-tips">
                    <li><strong>1. Know Your Audience:</strong> Teens should understand who is watching their livestreams and avoid interacting with strangers or sharing personal information.</li>
                    <li><strong>2. Enable Moderation:</strong> Use moderation tools on livestreaming platforms to filter out inappropriate comments and block/report abusive users.</li>
                    <li><strong>3. Set Boundaries:</strong> Establish clear guidelines on what is appropriate to share on camera. Avoid showing private spaces or wearing identifiable clothing.</li>
                    <li><strong>4. Use Privacy Settings:</strong> Adjust privacy settings to limit the audience to trusted friends or followers only, rather than the general public.</li>
                    <li><strong>5. Be Mindful of the Platform:</strong> Different platforms have different rules and safety features. Make sure teens are familiar with these and choose platforms with strong moderation policies.</li>
                    <li><strong>6. Take Breaks:</strong> Encourage teens to take regular breaks while livestreaming to avoid burnout and help them stay mentally healthy.</li>
                </ul>

                <!-- Add a YouTube video -->
                <div class="youtube-video">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/UUvhA8FnlDA?si=_PRT5MQWL2sAx_uy" frameborder="0" allowfullscreen></iframe>
                </div>

                <p>By following these tips, teens can enjoy the benefits of livestreaming while minimizing the risks of inappropriate interactions or privacy breaches.</p>
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