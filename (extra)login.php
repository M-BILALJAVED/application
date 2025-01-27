<?php
// Include database connection
include 'admin/db_connection.php';

session_start();

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
            $_SESSION['user'] = $row_student['name'];
            $_SESSION['role'] = 'student';
            header("Location: student_dashboard.php");
            exit();
        } else {
            $error_message = "Invalid email or password.";
        }
    } elseif ($result_teacher->num_rows > 0) {
        $row_teacher = $result_teacher->fetch_assoc();
        if (password_verify($password, $row_teacher['Password'])) {
            $_SESSION['user'] = $row_teacher['Name'];
            $_SESSION['role'] = 'teacher';
            header("Location: teacher_dashboard.php");
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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">Login</h2>
            <?php if (!empty($error_message)) : ?>
                <div class="alert alert-danger">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="login.php">
                <div class="mb-3">
                    <label for="email-input" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email-input" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password-input" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password-input" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
