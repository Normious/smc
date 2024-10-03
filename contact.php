<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Set up email details
    $to = "emmanueljin101@gmail.com"; // Change to your support email
    $subject = "New Message from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    // Send email using SMTP server
    $smtp_host = 'smtp.gmail.com';
    $smtp_port = 587;
    $smtp_username = 'emmanueljin101@gmail.com';
    $smtp_password = 'pyke vkzs lhkh zgev'; // Replace with your App Password

    $mail = new PHPMailer();
    $mail->SMTPDebug = 0; // Disable debug output
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = $smtp_host;
    $mail->Port = $smtp_port;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;

    $mail->SetFrom($email, 'SMC');
    $mail->AddAddress($to, 'Recipient Name');
    $mail->Subject = $subject;
    $mail->Body = $body;

    if (!$mail->Send()) {
        echo 'There was an issue sending your message. Please try again later.';
    } else {
        echo 'Message sent successfully!';
        echo '<br><br>';
        echo '<a href="javascript:history.back()">Go Back</a>';
    }
}
?>