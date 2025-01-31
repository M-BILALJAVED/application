<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-smile-wink me-2"></i>TUF - Student</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">
                <?php
                    // Assuming the session variable 'student_name' is already set
                    if (isset($_SESSION['student_name'])) {
                        echo $_SESSION['student_name'];
                    } else {
                        echo "student_name information not available.";
                    }
                    ?>
                </h6>
                <span>
                <?php
                    // Assuming the session variable 'Semester' is already set
                    if (isset($_SESSION['role'])) {
                        echo $_SESSION['role'];
                    } else {
                        echo "role information not available.";
                    }
                    ?>
                </span>
                <br>
                <span><?php
                    // Assuming the session variable 'Semester' is already set
                    if (isset($_SESSION['Semester'])) {
                        echo "Semester: " . $_SESSION['Semester'];
                    } else {
                        echo "Semester information not available.";
                    }
                    ?></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.php"
                class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="subject.php"
                class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'subject.php' ? 'active' : ''; ?>"><i
                    class="fa fa-book me-2"></i>Subjects</a>

        </div>
    </nav>
</div>
<!-- Sidebar End -->