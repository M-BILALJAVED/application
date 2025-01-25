<?php

// Start the session (you can remove session_start() if you no longer need it)
session_start();

// Check if the OTP cookie is set and valid
if (!isset($_COOKIE['otp_verified']) || $_COOKIE['otp_verified'] != "true") {
    // If the OTP cookie is not set or invalid, redirect to OTP page
    header("Location: forget_pass.php"); // Adjust this URL to your OTP page
    exit(); // Stop further script execution
}



$message = "";

// Check if form is submitted for password creation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password and confirm_password match
    if ($password === $confirm_password) {
        // Hash the password before saving to the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update the password in the database
        require_once 'db_connection.php';
        $email = $_SESSION['email'];  // Get email from session

        // Prepare the SQL query to update the password
        $stmt = $pdo->prepare("UPDATE admin_users SET password = :password WHERE email = :email");
        $stmt->execute([
            'password' => $hashed_password, // Hash the password for security
            'email' => $email                // Use the email stored in session
        ]);

        // Optionally, clear session after password update
        session_destroy(); // Clear session to require re-login with the new password

        // Redirect the user to the login page after successful password update
        header("Location: index.php");
        exit();
    } else {
        $message = "Passwords do not match. Please try again.";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <section class="login">
        <div class="login_wrapper d-flex justify-content-center align-items-center" style="height: 100%;">
            <div class="container">
                <div class="row login-box justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <form action="#" autocomplete="off" method="post">
                            <h2 class="text-light mb-4">Create New Password</h2>
                            <p class="text-white" style="text-transform: capitalize;text-align: justify;">Please enter
                                your new password and click 'Confirm' to proceed.</p>
                            <div class="input-field password-login-input">
                                <input type="password" name="password" required autocomplete="new-password"
                                    id="password">
                                <label for="password">Enter your password</label>
                                <i class="bi bi-eye"></i>
                            </div>
                            <div class="input-field password-login-input">
                                <input type="password" name="confirm_password" required
                                    autocomplete="new-confirm_password" id="confirm_password">
                                <label for="confirm_password">Confirm your password</label>
                                <i class="bi bi-eye"></i>
                            </div>
                            <button class="my_button my-4" type="submit" id="my_button">Confirm</button>
                            <p class="text-white">
                                <?php echo $message; ?>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/main.js"></script>
    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Select all password input fields and their respective icons
        const passwordIcons = document.querySelectorAll('.password-login-input i');
        const passwordInputs = document.querySelectorAll('.password-login-input input');

        // Loop through each password input field and its corresponding icon
        passwordIcons.forEach((iconElement, index) => {
            const passwordInput = passwordInputs[index]; // Corresponding input field
            iconElement.addEventListener('click', function () {
                // Toggle the input type between 'password' and 'text'
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    iconElement.classList.remove('bi-eye');
                    iconElement.classList.add('bi-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    iconElement.classList.remove('bi-eye-slash');
                    iconElement.classList.add('bi-eye');
                }
            });
        });
    </script>
</body>

</html>