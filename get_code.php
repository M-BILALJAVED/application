<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect OTP input from form
    if (isset($_POST['otp'])) {
        $otp = $_POST['otp']; // This will contain the concatenated 4-digit OTP value

        // Assuming the email is stored in the session from the previous step
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];

            // Connect to the database
            require_once 'db_connection.php'; // Ensure this is your correct DB connection file

            // Retrieve the stored OTP from the database for the specific email
            $stmt = $pdo->prepare("SELECT otp_code FROM admin_users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $stored_otp = $user['otp_code']; // Fetch the OTP stored in the database
                // Check if the OTP entered by the user is correct
                if ($otp == $stored_otp) {
                    $message = "OTP is correct! You can proceed.";
                } else {
                    $message = "Invalid OTP. Please try again.";
                }
            } else {
                $message = "No user found with that email address.";
            }
        } else {
            $message = "No email session found.";
        }
    } else {
        $message = "Please enter a valid OTP.";
    }
} else {
    $message = "";
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
    <style>
        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            margin-right: 10px;
        }

        .message {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <section class="login">
        <div class="login_wrapper d-flex justify-content-center align-items-center" style="height: 100%;">
            <div class="container">
                <div class="row login-box justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <form action="#" autocomplete="off" method="post">
                            <h2 class="text-light mb-4">Enter A Code</h2>
                            <p class="text-white" style="text-transform: capitalize;text-align: justify;">Please enter
                                the code that has been sent to your email.</p>

                            <h5 class="text-white">Email: <span class="text-warning">
                                    <?php
                                    echo isset($_SESSION['email']) ? $_SESSION['email'] : 'Not available';
                                    ?>
                                </span></h5>

                            <div class="d-flex justify-content-center my-3">
                                <input type="text" name="otp[]" maxlength="1" class="form-control otp-input" />
                                <input type="text" name="otp[]" maxlength="1" class="form-control otp-input" />
                                <input type="text" name="otp[]" maxlength="1" class="form-control otp-input" />
                                <input type="text" name="otp[]" maxlength="1" class="form-control otp-input" />
                            </div>
                            <button class="my_button my-4" type="submit" id="my_button">Verify</button>
                            <p class="text-white"><?php echo $message; ?></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Get all OTP input fields
        const otpInputs = document.querySelectorAll('.otp-input');

        // Add event listeners to each input field
        otpInputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                const value = e.target.value;

                // Move to the next input if a number is entered
                if (value && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
            });

            // Allow moving back with the backspace key
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    otpInputs[index - 1].focus();
                }
            });
        });

        document.querySelector("form").addEventListener("submit", function (e) {
            let otp = '';
            document.querySelectorAll('.otp-input').forEach(input => {
                otp += input.value; // Concatenate the OTP values
            });

            // Set the concatenated OTP value to the hidden input field or directly in the POST data
            if (otp.length === 4) {
                // Create a hidden input to store the full OTP
                let hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "otp";
                hiddenInput.value = otp;
                this.appendChild(hiddenInput);
            } else {
                e.preventDefault(); // Prevent form submission if OTP length is not 4
                alert('Please enter a valid 4-digit OTP');
            }
        });
    </script>
    <script src="js/main.js"></script>
    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>