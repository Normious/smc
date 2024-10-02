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
    <title>Legislation and Guidance - SMC Ltd</title>
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

    <!-- Legislation and Guidance Section -->
    <main>
        <section class="legislation-guidance">
            <div class="container">
                <h2>Legislation and Guidance for Safe Social Media Use</h2>
                <p>Ensuring safe use of social media involves adhering to relevant legislation and following best practice guidance. Below are some key regulations and standards related to online social media use.</p>

                <h3>1. General Data Protection Regulation (GDPR)</h3>
                <p>The GDPR is a comprehensive data protection law that applies to any company that collects personal data from users in the European Union. It ensures that users have control over their personal information, including the right to access, correct, and delete their data.</p>

                <h3>2. Children's Online Privacy Protection Act (COPPA)</h3>
                <p>COPPA is a US law that protects the privacy of children under 13 years old by regulating how websites collect personal information from young users. Websites targeting children must obtain parental consent before collecting any data.</p>

                <h3>3. Online Harms White Paper (UK)</h3>
                <p>This UK legislation aims to protect users from harmful content online. Social media platforms are expected to take reasonable steps to prevent the spread of harmful material, including cyberbullying and online abuse.</p>

                <h3>4. Communications Decency Act (CDA), Section 230</h3>
                <p>This US law provides immunity to social media platforms for content posted by third parties. However, platforms must take action against illegal content when notified, such as removing defamatory or harmful material.</p>

                <h3>5. Best Practices for Safe Social Media Use</h3>
                <ul>
                    <li><strong>Parental Controls:</strong> Use available tools to monitor and restrict social media activity for younger users.</li>
                    <li><strong>Privacy Settings:</strong> Ensure users understand how to adjust their privacy settings on various platforms to control who can see their content.</li>
                    <li><strong>Regular Updates:</strong> Keep social media platforms up-to-date to ensure you benefit from the latest security patches and features.</li>
                    <li><strong>Education:</strong> Encourage regular education and awareness about online safety, including cyberbullying prevention and data privacy.</li>
                </ul>

                <h3>6. Reporting Abuse</h3>
                <p>Users should be aware of the proper channels for reporting harmful or illegal activity on social media platforms. Most platforms provide built-in reporting features for flagging inappropriate content or behavior.</p>
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
