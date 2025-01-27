<?php
session_start();

// Check if the OTP cookie is set and valid
if (!isset($_COOKIE['userNypasssailagya']) || $_COOKIE['userNypasssailagya'] != "true") {
    header("Location: ../index.php"); // Redirect to OTP page if invalid
    exit();
}

// Include the database connection file
include 'DB_CONNECT.php';

if (!isset($conn)) {
    die("Database connection not established.");
}


// Initialize message variables
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $TeacherID = $_POST['TeacherID'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = password_hash($_POST['Password'], PASSWORD_BCRYPT); // Hash the password
    $Subject = $_POST['Subject'];
    $Phone = $_POST['Phone'];

    // SQL query to insert data
    $sql = "INSERT INTO Teacher_info (TeacherID, Name, Email, Password, Subject, Phone) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $TeacherID, $Name, $Email, $Password, $Subject, $Phone);

    if ($stmt->execute()) {
        $message = "Teacher added successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard Panel</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper d-flex">

        <?php include("sidenavbar.php"); ?>

        <div class="main">
            <section class="dashboard">
                <?php include("topwalasectiond.php"); ?>

                <div class="dash-content p-3">
                    <div class="overview">
                        <div class="title">
                            <i class="bi bi-speedometer2"></i>
                            <span class="text">Teachers</span>
                        </div>

                        <div class="boxes">
                            <button class="my__btn1" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
                                Add New Teacher
                                <i class="bi bi-plus-circle"></i>
                            </button>
                        </div>
                    </div>

                    <div class="activity">
                        <!-- Recent Activity Section -->
                        <div class="title">
                            <i class="bi bi-clock-history"></i>
                            <span class="text">Recent Activity</span>
                        </div>
                        <!-- Add Activity Table Here -->
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Add Teacher Modal -->
    <div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeacherModalLabel">Add New Teacher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Success/Error Message -->
                    <?php if (!empty($message)): ?>
                        <div class="alert <?= strpos($message, 'successfully') ? 'alert-success' : 'alert-danger' ?>">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>

                    <!-- Form -->
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="TeacherID" class="form-label">Teacher ID</label>
                            <input type="text" name="TeacherID" class="form-control" id="TeacherID"
                                placeholder="Enter Teacher ID" required>
                        </div>
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" name="Name" class="form-control" id="Name"
                                placeholder="Enter Teacher's Full Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="Subject" class="form-label">Subject</label>
                            <input type="text" name="Subject" class="form-control" id="Subject"
                                placeholder="Enter Subject Taught" required>
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email Address</label>
                            <input type="email" name="Email" class="form-control" id="Email"
                                placeholder="Enter Email Address" required>
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" name="Password" class="form-control" id="Password"
                                placeholder="Enter Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="Phone" class="form-label">Phone Number</label>
                            <input type="tel" name="Phone" class="form-control" id="Phone" pattern="[0-9]{10}"
                                placeholder="1234567890" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Teacher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>