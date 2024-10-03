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

        // Check if account is locked
        if ($row['locked_until'] !== NULL && strtotime($row['locked_until']) > time()) {
            $unlock_time = date("Y-m-d H:i:s", strtotime($row['locked_until']));
            echo "Account locked for 10 minutes. Try again at $unlock_time";
            echo '<br><br>';
            echo '<a href="javascript:history.back()">Go Back</a>';
            exit();
        }

        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['name']; // Use the name from the database for the session
            $_SESSION['user_id'] = $row['id'];

            // Reset login attempts and locked_until
            $sql = "UPDATE users SET login_attempts = 0, locked_until = NULL WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $row['id']);
            $stmt->execute();

            // Determine the redirect location
            $redirect = isset($_POST['redirect']) ? $_POST['redirect'] : 'home.php';

            // Redirect after successful login
            header("Location: $redirect?login=success");
            exit();
        } else {
            // Increment login attempts
            $sql = "UPDATE users SET login_attempts = login_attempts + 1 WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $row['id']);
            $stmt->execute();

            // Check if login attempts reach 3
            if ($row['login_attempts'] >= 3) {
                $sql = "UPDATE users SET locked_until = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $row['id']);
                $stmt->execute();
                $unlock_time = date("Y-m-d H:i:s", strtotime($row['locked_until']));
                echo "Account locked for 10 minutes. Try again at $unlock_time";
            } else {
                echo "Invalid password";
                echo '<br><br>';
                echo '<a href="javascript:history.back()">Go Back</a>';
            }
        }
    } else {
        echo "No user found with that email";
        echo '<br><br>';
        echo '<a href="javascript:history.back()">Go Back</a>';
    }

    $stmt->close();
    $conn->close();
}
?>