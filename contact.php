<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Set up email details for local mail
    $to = "testuser@localhost"; // Local email user in Mercury Mail
    $subject = "New Message from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email\r\n";

    // Send email using PHP's mail() function
    if (mail($to, $subject, $body, $headers)) {
        echo 'Message sent successfully to local user!';
        echo '<br><br>';
        echo '<a href="javascript:history.back()">Go Back</a>';
    } else {
        echo 'There was an issue sending your message. Please try again later.';
    }
}
?>
