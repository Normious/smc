<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);

    // Fetch the user with the given email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // Bind email to the query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['name']; // Use the name from the database for the session
            $_SESSION['user_id'] = $row['id'];

            // Determine the redirect location
            $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : 'home.php';

            // Redirect after successful login
            header("Location: $redirect?login=success");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that email";
    }

    $stmt->close();
    $conn->close();
}
?>
