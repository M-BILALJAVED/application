<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-smile-wink me-2"></i>TUF - Teacher</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0"><?php echo htmlspecialchars($_SESSION['Teacher_name']); ?></h6>
                <span><?php echo htmlspecialchars($_SESSION['role']); ?></span>
                <br>
                <span><?php echo htmlspecialchars($_SESSION['subject']); ?></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.php"
                class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>"><i
                    class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="Subject.php"
                class="nav-item nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'Subject.php' ? 'active' : ''; ?>"><i
                    class="fa fa-book me-2"></i>Subject</a>

        </div>
    </nav>
</div>