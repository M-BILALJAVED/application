<?php
// Include database connection
include 'DB_CONNECT.php';

session_start();

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password']);

    // Query for students_info
    $sql_student = "SELECT * FROM students_info WHERE email = ?";
    $stmt_student = $conn->prepare($sql_student);
    $stmt_student->bind_param("s", $email);
    $stmt_student->execute();
    $result_student = $stmt_student->get_result();

    // Query for teacher_info
    $sql_teacher = "SELECT * FROM teacher_info WHERE Email = ?";
    $stmt_teacher = $conn->prepare($sql_teacher);
    $stmt_teacher->bind_param("s", $email);
    $stmt_teacher->execute();
    $result_teacher = $stmt_teacher->get_result();

    if ($result_student->num_rows > 0) {
        $row_student = $result_student->fetch_assoc();
        if ($password === $row_student['pass']) { // Use `password_verify` if passwords are hashed
            $_SESSION['student_id'] = $row_student['student_id']; // Storing student ID in session
            $_SESSION['Semester'] = $row_student['semester'];
            $_SESSION['student_name'] = $row_student['name'];
            $_SESSION['role'] = 'student';
            header("Location: Student");
            exit();
        } else {
            $error_message = "Invalid email or password.";
        }
    } elseif ($result_teacher->num_rows > 0) {
        $row_teacher = $result_teacher->fetch_assoc();
        if (password_verify($password, $row_teacher['Password'])) {
            $_SESSION['Teacher_id'] = $row_teacher['TeacherID'];
            $_SESSION['Teacher_name'] = $row_teacher['Name'];
            $_SESSION['subject'] = $row_teacher['Subject'];
            $_SESSION['role'] = 'teacher';
            header("Location: Teacher");
            exit();
        } else {
            $error_message = "Invalid email or password.";
        }
    } else {
        $error_message = "Invalid email or password.";
    }

    // Close connections
    $stmt_student->close();
    $stmt_teacher->close();
    $conn->close();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Login</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <section>
        <div class="Login_main wrapper" id="Login_main">
            <h1>Login</h1>
            <?php if (!empty($error_message)) : ?>
                <p id="error-message" class="text-danger"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <form id="form" action="" method="POST">
                <div>
                    <label for="email-input">
                        <span>@</span>
                    </label>
                    <input type="email" name="email" id="email-input" placeholder="Email" required>
                </div>
                <div>
                    <label for="password-input">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path
                                d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm240-200q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80Z" />
                        </svg>
                    </label>
                    <input type="password" name="password" id="password-input" placeholder="Password" required>
                </div>
                <button type="submit">Login</button>
            </form>
            <p>New here? <a id="Open_Signup" href="#">Create an Account</a></p>
        </div>
    </section>

    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
