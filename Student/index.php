<?php
session_start();
if (!isset($_SESSION['student_name']) || $_SESSION['role'] !== 'student') {
    header("Location: ./index.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Student</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../Teacher/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../Teacher/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Teacher/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Teacher/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php include("Right_SideBar.php") ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include("Top_NavBar.php") ?>
            <!-- Navbar End -->


            <!-- ========== Start blank ========== -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center">
                        <!--  -->
                        <div class="container mt-5">
                            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['student_name']); ?>!</h1>
                            <p>This is the student dashboard.</p>
                            <a href="../logout.php" class="btn btn-danger">Logout</a>
                        </div>
                        <!--  -->
                        <!-- <h3>This is blank page</h3> -->
                    </div>
                </div>
            </div>
            <!-- ========== End blank ========== -->




            <!-- Footer Start -->
            <footer class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Teacher/lib/easing/easing.min.js"></script>
    <script src="../Teacher/lib/waypoints/waypoints.min.js"></script>
    <script src="../Teacher/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../Teacher/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../Teacher/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../Teacher/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../Teacher/js/main.js"></script>
    <script src="../Teacher/js/for_Subject.js"></script>
    <!--  -->
    
</body>

</html>