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
    <title>Teacher -Admin Dashboard Panel</title>

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
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Teacher ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th> <!-- Added Password column -->
                                    <th>Subject</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'DB_CONNECT.php'; // Include your DB connection file
                                
                                // Fetch data from the teacher_info table
                                $sql = "SELECT * FROM teacher_info";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Get teacher ID for editing and deleting
                                        $teacherID = $row['TeacherID'];
                                        echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['TeacherID']}</td>
                    <td>{$row['Name']}</td>
                    <td>{$row['Email']}</td>
                    <td>**********</td> 
                    <td>{$row['Subject']}</td>
                    <td>{$row['Phone']}</td>
                    <td>
                        <!-- Edit button triggers modal -->
                        <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editTeacherModal'
                                data-teacherid='{$row['TeacherID']}'
                                data-name='{$row['Name']}'
                                data-email='{$row['Email']}'
                                data-password='{$row['Password']}'
                                data-subject='{$row['Subject']}'
                                data-phone='{$row['Phone']}'>
                            Edit
                        </button>
                        <a href='delete_teacher.php?teacherID=$teacherID' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this teacher?\");'>
                            Delete
                        </a>
                    </td>
                </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No data found</td></tr>";
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
                                placeholder="Enter Subject" list="subjectsList" required>
                            <datalist id="subjectsList">
                                <?php
                                include('Books.php');
                                foreach ($allSubjects as $subject): ?>
                                    <option value="<?php echo htmlspecialchars($subject); ?>"></option>
                                <?php endforeach; ?>
                            </datalist>
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
                            <input type="tel" name="Phone" class="form-control" id="Phone" pattern="[0-9]{11}"
                                placeholder="1234567890" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Teacher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== Start update in sql ========== -->
    <!-- Edit Teacher Modal -->
    <div class="modal fade" id="editTeacherModal" tabindex="-1" aria-labelledby="editTeacherModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTeacherModalLabel">Edit Teacher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form to Edit Teacher Details -->
                    <form id="editTeacherForm" method="POST" action="update_teacher.php">
                        <input type="hidden" name="TeacherID" id="modalTeacherID">

                        <div class="mb-3">
                            <label for="modalName" class="form-label">Name</label>
                            <input type="text" name="Name" class="form-control" id="modalName" required>
                        </div>
                        <div class="mb-3">
                            <label for="modalEmail" class="form-label">Email Address</label>
                            <input type="email" name="Email" class="form-control" id="modalEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="modalPassword" class="form-label">Password</label>
                            <input type="password" name="Password" class="form-control" id="modalPassword">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="modalSubject" class="form-label">Subject</label>
                            <input type="text" name="Subject" class="form-control" id="modalSubject" required>
                        </div> -->
                        <div class="mb-3">
                            <label for="modalSubject" class="form-label">Subject</label>
                            <input type="text" name="Subject" class="form-control" id="modalSubject" list="subjectsList"
                                required>
                            <datalist id="subjectsList">
                                <?php
                                include('Books.php');
                                foreach ($allSubjects as $subject): ?>
                                    <option value="<?php echo htmlspecialchars($subject); ?>"></option>
                                <?php endforeach; ?>
                            </datalist>
                        </div>
                        <div class="mb-3">
                            <label for="modalPhone" class="form-label">Phone Number</label>
                            <input type="tel" name="Phone" class="form-control" id="modalPhone" pattern="[0-9]{11}"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== End update in sql ========== -->


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Add event listener to handle the modal data
        var editModal = document.getElementById('editTeacherModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            // Get the button that triggered the modal
            var button = event.relatedTarget;

            // Extract information from data-* attributes
            var teacherID = button.getAttribute('data-teacherid');
            var name = button.getAttribute('data-name');
            var email = button.getAttribute('data-email');
            var subject = button.getAttribute('data-subject');
            var phone = button.getAttribute('data-phone');

            // Populate the modal fields with the teacher data
            document.getElementById('modalTeacherID').value = teacherID;
            document.getElementById('modalName').value = name;
            document.getElementById('modalEmail').value = email;
            document.getElementById('modalSubject').value = subject;
            document.getElementById('modalPhone').value = phone;
        });

    </script>

    </script>

</body>

</html>