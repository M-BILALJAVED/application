<?php
session_start();

// Check if the OTP cookie is set and valid
if (!isset($_COOKIE['userNypasssailagya']) || $_COOKIE['userNypasssailagya'] != "true") {
    // If the OTP cookie is not set or invalid, redirect to OTP page
    header("Location: ../index.php"); // Adjust this URL to your OTP page
    exit(); // Stop further script execution
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
                        <div class="title">
                            <i class="bi bi-clock-history"></i>
                            <span class="text">Recent Activity</span>
                        </div>

                        <div class="activity-data">
                            <!-- Name Column -->
                            <div class="data names">
                                <span class="data-title">Name</span>
                                <span class="data-list">Prem Shahi</span>
                                <span class="data-list">Deepa Chand</span>
                                <span class="data-list">Manisha Chand</span>
                                <span class="data-list">Pratima Shahi</span>
                            </div>
                            <!-- Email Column -->
                            <div class="data email">
                                <span class="data-title">Email</span>
                                <span class="data-list">premshahi@gmail.com</span>
                                <span class="data-list">deepachand@gmail.com</span>
                                <span class="data-list">prakashhai@gmail.com</span>
                                <span class="data-list">manishachand@gmail.com</span>
                            </div>
                            <!-- Phone Column -->
                            <div class="data phone">
                                <span class="data-title">Phone</span>
                                <span class="data-list">9876543210</span>
                                <span class="data-list">8765432109</span>
                                <span class="data-list">7654321098</span>
                                <span class="data-list">6543210987</span>
                            </div>
                            <!-- Subject Column -->
                            <div class="data subject">
                                <span class="data-title">Subject</span>
                                <span class="data-list">Mathematics</span>
                                <span class="data-list">Science</span>
                                <span class="data-list">English</span>
                                <span class="data-list">History</span>
                            </div>
                            <!-- Gender Column -->
                            <div class="data gender">
                                <span class="data-title">Gender</span>
                                <span class="data-list">Male</span>
                                <span class="data-list">Female</span>
                                <span class="data-list">Female</span>
                                <span class="data-list">Female</span>
                            </div>
                            <!-- Experience Column -->
                            <div class="data experience">
                                <span class="data-title">Experience (Years)</span>
                                <span class="data-list">5</span>
                                <span class="data-list">3</span>
                                <span class="data-list">7</span>
                                <span class="data-list">4</span>
                            </div>
                            <!-- Address Column -->
                            <div class="data address">
                                <span class="data-title">Address</span>
                                <span class="data-list">123 Main St, City A</span>
                                <span class="data-list">456 Oak St, City B</span>
                                <span class="data-list">789 Pine St, City C</span>
                                <span class="data-list">321 Elm St, City D</span>
                            </div>
                        </div>
                    </div>



                </div>
            </section>
        </div>
    </div>


    <!-- ========== Start modal teacher ========== -->
    <!-- Modal -->
    <div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="addTeacherModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeacherModalLabel">Add New Teacher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your form or content goes here -->
                    <form>
                        <div class="mb-3">
                            <label for="teacherName" class="form-label">Teacher Name</label>
                            <input type="text" class="form-control" id="teacherName" required>
                        </div>
                        <div class="mb-3">
                            <label for="teacherEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="teacherEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="teacherPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="teacherPhone" pattern="[0-9]{10}"
                                placeholder="1234567890" required>
                        </div>
                        <div class="mb-3">
                            <label for="teacherSubject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="teacherSubject" required>
                        </div>
                        <div class="mb-3">
                            <label for="teacherGender" class="form-label">Gender</label>
                            <select class="form-control" id="teacherGender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="teacherExperience" class="form-label">Years of Experience</label>
                            <input type="number" class="form-control" id="teacherExperience" min="0" required>
                        </div>
                        <div class="mb-3">
                            <label for="teacherAddress" class="form-label">Address</label>
                            <textarea class="form-control" id="teacherAddress" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Teacher</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- ========== End modal teacher ========== -->

    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="script.js"></script>

</body>

</html>