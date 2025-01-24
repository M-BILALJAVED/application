<?php
// Database credentials
$host = 'localhost'; // Change if using a remote server
$username = 'root';  // Change to your database username
$password = '';      // Change to your database password
$dbname = 'application'; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment for debugging purpose
// echo "Connected successfully";

?>
