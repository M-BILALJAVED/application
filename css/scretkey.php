<?php
require_once 'db_connection.php';

// Static password 'admin'
$password = 'admin';

// Hash the password before storing it (for security)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Generate a random email for the user
function generateRandomEmail() {
    $domains = ['gmail.com', 'yahoo.com', 'outlook.com'];
    return 'user' . rand(1000, 9999) . '@' . $domains[array_rand($domains)];
}

try {
    // Generate random email
    $randomEmail = generateRandomEmail();

    // Prepare the SQL query to insert the user with the hashed password
    $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $stmt->execute([
        'email' => $randomEmail,
        'password' => $hashedPassword
    ]);

    echo "Random user created with email: $randomEmail and password: $password";
} catch (PDOException $e) {
    echo "Error inserting random user: " . $e->getMessage();
}
?> -->
