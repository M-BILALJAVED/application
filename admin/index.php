<?php
// Include the database connection file
require_once 'db_connection.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $generatedCaptcha = $_POST['generatedCaptcha'];
    $userCaptcha = $_POST['captcha'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate CAPTCHA
    if (strtoupper($generatedCaptcha) !== strtoupper($userCaptcha)) {
        $message = "Incorrect CAPTCHA. Please try again.";
    } else {
        // Check if email exists in the database
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Successful login, start session and redirect
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                // OTP is correct, set a cookie for 1 minute
                setcookie("userNypasssailagya", "true", time() + 36000, "/"); // expires in 1 minute

                header('Location: D_Admin'); // Redirect to a secure page
                exit;
            } else {
                $message = "Incorrect password. Please try again.";
            }
        } else {
            $message = "No user found with that email address.";
        }
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
                            <h2 class="text-light mb-4">Login</h2>
                            <div class="input-field">
                                <input type="text" name="email" required autocomplete="off" id="email">
                                <label for="email">Enter your email</label>
                            </div>
                            <div class="input-field password-login-input">
                                <input type="password" name="password" required id="password">
                                <label for="password">Enter your password</label>
                                <i class="bi bi-eye"></i>
                            </div>
                            <div class="row justify-content-between align-items-baseline mt-3">
                                <div class="col-5">
                                    <div class="input-group captch_box">
                                        <div id="captcha" class="form-control text-white" disabled="">
                                            <?php echo $generatedCaptcha; ?>
                                        </div>
                                        <span class="input-group-text"><i
                                                class="bi bi-arrow-repeat text-white"></i></span>
                                        <input type="hidden" id="generatedCaptchaInput" name="generatedCaptcha"
                                            value="<?php echo $generatedCaptcha; ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-field captch_input">
                                        <input type="text" name="captcha" required autocomplete="new-captcha"
                                            id="captchaInput" style="text-transform: uppercase;">
                                        <label for="captcha">Enter Captcha</label>
                                    </div>
                                </div>
                            </div>
                            <div class="forget my-3 mt-4">
                                <a href="forget_pass.php" style="color: #efefef;">Forgot password?</a>
                            </div>
                            <button class="my_button" type="submit" id="my_button">Log In</button>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const captchaDiv = document.getElementById("captcha");
            const refreshButton = document.querySelector(".captch_box .input-group-text");
            const captchaHiddenInput = document.getElementById("generatedCaptchaInput");

            const fonts = ["Arial", "Verdana", "Courier New", "Georgia", "Times New Roman", "Comic Sans MS"];

            function generateCaptcha() {
                const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                const colors = ["#FF5733", "#33FF57", "#3357FF", "#F333FF", "#FFDD33", "#33FFF3", "#FF5733", "#FF8C00", "#00FF7F", "yellow"];
                const captchaLength = 4;
                let captchaText = "";

                captchaDiv.innerHTML = "";

                for (let i = 0; i < captchaLength; i++) {
                    const char = chars.charAt(Math.floor(Math.random() * chars.length));
                    const span = document.createElement("span");

                    span.textContent = char;
                    span.style.color = colors[Math.floor(Math.random() * colors.length)];
                    span.style.fontFamily = fonts[Math.floor(Math.random() * fonts.length)];
                    span.style.fontSize = `${Math.floor(Math.random() * 11) + 15}px`;

                    captchaDiv.appendChild(span);
                    captchaText += char;
                }

                captchaHiddenInput.value = captchaText; // Store CAPTCHA in hidden input for submission
            }

            generateCaptcha();

            refreshButton.addEventListener("click", generateCaptcha);
        });

        // Select the icon and input elements
        const iconElement = document.querySelector('.password-login-input i');
        const passwordInput = document.querySelector('#password');

        // Add a click event listener to the icon
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
    </script>
</body>

</html>