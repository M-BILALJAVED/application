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
        <div class="main p-3">
            <section class="dashboard">

                <?php include("topwalasectiond.php"); ?>

                <div class="dash-content">
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
                            <div class="data names">
                                <span class="data-title">Name</span>
                                <span class="data-list">Prem Shahi</span>
                                <span class="data-list">Deepa Chand</span>
                                <span class="data-list">Manisha Chand</span>
                                <span class="data-list">Pratima Shahi</span>
                                <span class="data-list">Man Shahi</span>
                                <span class="data-list">Ganesh Chand</span>
                                <span class="data-list">Bikash Chand</span>
                            </div>
                            <div class="data email">
                                <span class="data-title">Email</span>
                                <span class="data-list">premshahi@gmail.com</span>
                                <span class="data-list">deepachand@gmail.com</span>
                                <span class="data-list">prakashhai@gmail.com</span>
                                <span class="data-list">manishachand@gmail.com</span>
                                <span class="data-list">pratimashhai@gmail.com</span>
                                <span class="data-list">manshahi@gmail.com</span>
                                <span class="data-list">ganeshchand@gmail.com</span>
                            </div>
                            <div class="data joined">
                                <span class="data-title">Joined</span>
                                <span class="data-list">2022-02-12</span>
                                <span class="data-list">2022-02-12</span>
                                <span class="data-list">2022-02-13</span>
                                <span class="data-list">2022-02-13</span>
                                <span class="data-list">2022-02-14</span>
                                <span class="data-list">2022-02-14</span>
                                <span class="data-list">2022-02-15</span>
                            </div>
                            <div class="data type">
                                <span class="data-title">Type</span>
                                <span class="data-list">New</span>
                                <span class="data-list">Member</span>
                                <span class="data-list">Member</span>
                                <span class="data-list">New</span>
                                <span class="data-list">Member</span>
                                <span class="data-list">New</span>
                                <span class="data-list">Member</span>
                            </div>
                            <div class="data status">
                                <span class="data-title">Status</span>
                                <span class="data-list">Liked</span>
                                <span class="data-list">Liked</span>
                                <span class="data-list">Liked</span>
                                <span class="data-list">Liked</span>
                                <span class="data-list">Liked</span>
                                <span class="data-list">Liked</span>
                                <span class="data-list">Liked</span>
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
        <div class="modal-dialog">
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
                        <!-- You can add more fields as needed -->
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