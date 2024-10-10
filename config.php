<?php
$servername = "localhost";
$username = "smc.user";
$password = "1234567890";
$dbname = "smc_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
