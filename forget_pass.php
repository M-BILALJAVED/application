<?php
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email entered by the user
    $email = $_POST['email'];

    // Check if email exists in the database
    require_once 'db_connection.php';

    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Generate a 4-digit OTP
        $otp = rand(1000, 9999);

        // Set the OTP expiration time (e.g., 5 minutes from now)
        $expiry_time = date("Y-m-d H:i:s", strtotime("+5 minutes"));

        // Update OTP and expiration time in the database for the matched email
        $updateStmt = $pdo->prepare("UPDATE admin_users SET otp_code = :otp, otp_expiry = :expiry_time WHERE email = :email");
        $updateStmt->execute([
            'otp' => $otp,
            'expiry_time' => $expiry_time,
            'email' => $email
        ]);

        // Store email in session
        session_start(); // Make sure session is started before using $_SESSION
        $_SESSION['email'] = $email;

        // Redirect the user to another page (e.g., 'get_code.php')
        header("Location: get_code.php"); // Change this to the page you want to redirect to
        exit(); // Stop script execution after redirect

    } else {
        $message = "No user found with that email address.";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forget Password</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <section class="login">
        <div class="login_wrapper d-flex justify-content-center align-items-center" style="height: 100%;">
            <div class="container">
                <div class="row login-box justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <form action="#" autocomplete="off" method="post">
                            <h2 class="text-light mb-4">Forget Password</h2>
                            <p class="text-white" style="text-transform: capitalize;text-align: justify;">A verification
                                code has been sent to your email inbox. Please check your email.</p>
                            <div class="input-field">
                                <input type="text" name="email" required autocomplete="off" id="email">
                                <label for="email">Enter your email</label>
                            </div>
                            <button class="my_button my-4" type="submit" id="my_button">Send Code</button>
                            <p class="text-white"><?php echo $message; ?></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/main.js"></script>
    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>