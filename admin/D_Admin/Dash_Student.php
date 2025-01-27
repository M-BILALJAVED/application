<?php
session_start();

// Check if the OTP cookie is set and valid
if (!isset($_COOKIE['userNypasssailagya']) || $_COOKIE['userNypasssailagya'] != "true") {
    // If the OTP cookie is not set or invalid, redirect to OTP page
    header("Location: ../index.php"); // Adjust this URL to your OTP page
    exit(); // Stop further script execution
}

// Include the database connection file
include 'DB_CONNECT.php';

if (!isset($conn)) {
    die("Database connection not established.");
}

// Initialize message variable
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $student_id = $_POST['student_id'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $semester = $_POST['semester'];
    $phone_number = $_POST['phone_number'];

    // SQL query to insert data into Students_info table
    $sql = "INSERT INTO Students_info (student_id, name, email, pass, gender, semester, phone_number)
            VALUES ('$student_id', '$name', '$email', '$pass', '$gender', '$semester', '$phone_number')";

    if ($conn->query($sql) === TRUE) {
        $message = "New student added successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
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

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- lineicons -->
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper d-flex">

        <?php include("sidenavbar.php"); ?>

        <!--  -->
        <div class="main">
            <section class="dashboard">

                <?php include("topwalasectiond.php"); ?>

                <div class="dash-content  p-3">
                    <div class="overview">

                        <div class="title">
                            <i class="bi bi-speedometer2"></i>
                            <span class="text">Students</span>
                        </div>

                        <div class="boxes">
                            <button class="my__btn1" data-bs-toggle="modal" data-bs-target="#addStudentsModal">
                                Add New Students
                                <i class="bi bi-plus-circle"></i>
                            </button>

                        </div>
                    </div>

                    <div class="activity">
                        <div class="title">
                            <i class="bi bi-clock-history"></i>
                            <span class="text">Recent Activity</span>
                        </div>

                        <div class="activity-data">
                            <div class="data names">
                                <span class="data-title">Name</span>
                                <span class="data-list">Prem Shahi</span>
                                <span class="data-list">Deepa Chand</span>
                                <span class="data-list">Manisha Chand</span>
                                <span class="data-list">Pratima Shahi</span>
                            </div>
                            <div class="data email">
                                <span class="data-title">Email</span>
                                <span class="data-list">premshahi@gmail.com</span>
                                <span class="data-list">deepachand@gmail.com</span>
                                <span class="data-list">manishachand@gmail.com</span>
                                <span class="data-list">pratimashahi@gmail.com</span>
                            </div>
                            <div class="data roll-number">
                                <span class="data-title">Roll Number</span>
                                <span class="data-list">1001</span>
                                <span class="data-list">1002</span>
                                <span class="data-list">1003</span>
                                <span class="data-list">1004</span>
                            </div>
                            <div class="data dob">
                                <span class="data-title">Date of Birth</span>
                                <span class="data-list">2001-05-12</span>
                                <span class="data-list">2002-06-15</span>
                                <span class="data-list">2001-11-20</span>
                                <span class="data-list">2003-03-18</span>
                            </div>
                            <div class="data phone">
                                <span class="data-title">Phone Number</span>
                                <span class="data-list">1234567890</span>
                                <span class="data-list">9876543210</span>
                                <span class="data-list">5556667778</span>
                                <span class="data-list">8889990001</span>
                            </div>
                            <div class="data gender">
                                <span class="data-title">Gender</span>
                                <span class="data-list">Male</span>
                                <span class="data-list">Female</span>
                                <span class="data-list">Female</span>
                                <span class="data-list">Female</span>
                            </div>
                            <div class="data address">
                                <span class="data-title">Address</span>
                                <span class="data-list">Kathmandu, Nepal</span>
                                <span class="data-list">Pokhara, Nepal</span>
                                <span class="data-list">Lalitpur, Nepal</span>
                                <span class="data-list">Bhaktapur, Nepal</span>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
        </div>
    </div>


    <!-- ========== Start modal Students ========== -->
    <!-- Modal -->
    <div class="modal fade" id="addStudentsModal" tabindex="-1" aria-labelledby="addStudentsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentsModalLabel">Add New Students</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Success/Error Message -->
                    <?php if (!empty($message)): ?>
                        <div class="alert <?= strpos($message, 'successfully') ? 'alert-success' : 'alert-danger' ?>">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>
                    <!-- Your form or content goes here -->
                    <form method="POST" action="">
                        <!-- Specify the correct path to your PHP script -->
                        <div class="mb-3">
                            <label for="StudentID" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="StudentID" name="student_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="StudentsName" class="form-label">Student's Name</label>
                            <input type="text" class="form-control" id="StudentsName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="StudentsEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="StudentsEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" name="pass" required>
                        </div>
                        <div class="mb-3">
                            <label for="Gender" class="form-label">Gender</label>
                            <select class="form-control" id="Gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Semester" class="form-label">Semester</label>
                            <input type="text" class="form-control" id="Semester" name="semester" required>
                        </div>
                        <div class="mb-3">
                            <label for="PhoneNumber" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="PhoneNumber" name="phone_number"
                                pattern="[0-9]{10}" placeholder="1234567890" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Student</button>
                    </form>




                </div>
            </div>
        </div>
    </div>

    <!-- ========== End modal Students ========== -->

    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="script.js"></script>

</body>

</html>