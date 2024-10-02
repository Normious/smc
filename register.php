<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = password_hash(trim($_POST['password']), PASSWORD_BCRYPT); // Hash the password securely

    // Insert the new user into the database
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password); // Bind the data

    if ($stmt->execute()) {
        $_SESSION['username'] = $name; // Set the session variable with the user's name
        $_SESSION['user_id'] = $conn->insert_id;

        // Determine the redirect location
        $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : 'home.php';

        // Redirect to the target page after successful signup
        header("Location: $redirect?signup=success");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
