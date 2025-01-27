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
    <title>Student -Admin Dashboard Panel</title>

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- lineicons -->
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }


        tr th {
            background-color: lightgray !important;
        }

        td {
            border: 1px solid lightsteelblue;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
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


                        <table class="table">
                            <thead>
                                <tr style="background: lightgray;">
                                    <th>ID</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Gender</th>
                                    <th>Semester</th>
                                    <th>Phone Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'DB_CONNECT.php'; // Include your DB connection file
                                
                                // Fetch data from the students_info table
                                $sql = "SELECT * FROM students_info";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Get teacher ID for editing and deleting
                                        $student_id = $row['student_id'];
                                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['student_id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>************</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['semester']}</td>
                                <td>{$row['phone_number']}</td>
                                <td>
                                    <button class='btn btn-warning btn-sm edit-btn' 
                                            data-id='{$row['id']}'
                                            data-student_id='{$row['student_id']}'
                                            data-name='{$row['name']}'
                                            data-email='{$row['email']}'
                                            data-pass='{$row['pass']}'
                                            data-gender='{$row['gender']}'
                                            data-semester='{$row['semester']}'
                                            data-phone_number='{$row['phone_number']}'
                                            data-bs-toggle='modal' 
                                            data-bs-target='#editModal'>
                                        Edit
                                    </button>
                                     <a href='delete_student.php?student_id=$student_id' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this student?\");'>
                            Delete
                        </a>
                                </td>
                              </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='9'>No data found</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </tbody>
                        </table>

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

    <!-- ========== Start edit ========== -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="edit_student_process.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="mb-3">
                            <label for="edit-student_id" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="edit-student_id" name="student_id" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="edit-name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit-email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-pass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="edit-pass" name="pass" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-gender" class="form-label">Gender</label>
                            <select class="form-control" id="edit-gender" name="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit-semester" class="form-label">Semester</label>
                            <input type="text" class="form-control" id="edit-semester" name="semester" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="edit-phone_number" name="phone_number" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ========== End edit ========== -->


    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="script.js"></script>
    <script>
        // Populate modal with data on Edit button click
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                document.getElementById('edit-id').value = this.dataset.id;
                document.getElementById('edit-student_id').value = this.dataset.student_id;
                document.getElementById('edit-name').value = this.dataset.name;
                document.getElementById('edit-email').value = this.dataset.email;
                document.getElementById('edit-pass').value = this.dataset.pass;
                document.getElementById('edit-gender').value = this.dataset.gender;
                document.getElementById('edit-semester').value = this.dataset.semester;
                document.getElementById('edit-phone_number').value = this.dataset.phone_number;
            });
        });
    </script>

</body>

</html>