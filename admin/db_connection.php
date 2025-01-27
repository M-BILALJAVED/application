<?php
// // db_connection.php
// $host = 'localhost'; // Database host
// $dbname = 'application'; // Database name
// $username = 'root'; // Database username
// $password = ''; // Database password

// try {
//     $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     die("Database connection failed: " . $e->getMessage());
// }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "application";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>