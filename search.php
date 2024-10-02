<?php
// search.php

// Database connection
$host = 'localhost';
$user = 'root';
$password = 'e930930880p';
$dbname = 'smc_database';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Check if there's a search query
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    $searchQuery = $conn->real_escape_string($searchQuery);

    // SQL query to search for safety techniques
    $sql = "SELECT title, description FROM safety_techniques WHERE title LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";

    $result = $conn->query($sql);

    // If results exist, display them
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="result-item">';
            echo '<h3>' . $row['title'] . '</h3>';
            echo '<p>' . $row['description'] . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>No safety techniques found.</p>';
    }
}

$conn->close();
?>
