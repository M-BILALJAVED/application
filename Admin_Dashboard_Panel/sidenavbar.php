<aside id="sidebar" class="expand">

    <div class="d-flex">
        <div class="adminHub_I">
            <i class="bi bi-emoji-smile-upside-down"></i>
        </div>
        <div class="sidebar-logo">
            <a href="#" class="list-unstyled">Admin Hub</a>
        </div>
    </div>

    <ul class="sidebar-nav">
        <!-- Dashboard -->
        <li class="sidebar-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
            <a href="index.php" class="sidebar-link">
                <i class="lni lni-user"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Teachers -->
        <li class="sidebar-item <?php echo basename($_SERVER['PHP_SELF']) == 'Dash_Teacher.php' ? 'active' : ''; ?>">
            <a href="Dash_Teacher.php" class="sidebar-link">
                <i class="lni lni-agenda"></i>
                <span>Teachers</span>
            </a>
        </li>

        <!-- Students -->
        <li class="sidebar-item <?php echo basename($_SERVER['PHP_SELF']) == 'Dash_Student.php' ? 'active' : ''; ?>">
            <a href="Dash_Student.php" class="sidebar-link">
                <i class="lni lni-agenda"></i>
                <span>Students</span>
            </a>
        </li>

        <!-- Auth Dropdown -->
        <li
            class="sidebar-item <?php echo in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'register.php']) ? 'active' : ''; ?>">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth"
                aria-expanded="<?php echo in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'register.php']) ? 'true' : 'false'; ?>"
                aria-controls="auth">
                <i class="lni lni-protection"></i>
                <span>Auth</span>
            </a>
            <ul id="auth"
                class="sidebar-dropdown list-unstyled collapse <?php echo in_array(basename($_SERVER['PHP_SELF']), ['login.php', 'register.php']) ? 'show' : ''; ?>"
                data-bs-parent="#sidebar">
                <li class="sidebar-item <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>">
                    <a href="login.php" class="sidebar-link">Login</a>
                </li>
                <li
                    class="sidebar-item <?php echo basename($_SERVER['PHP_SELF']) == 'register.php' ? 'active' : ''; ?>">
                    <a href="register.php" class="sidebar-link">Register</a>
                </li>
            </ul>
        </li>

        <!-- Multi-Level Dropdown -->
        <li
            class="sidebar-item <?php echo in_array(basename($_SERVER['PHP_SELF']), ['link1.php', 'link2.php']) ? 'active' : ''; ?>">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi"
                aria-expanded="<?php echo in_array(basename($_SERVER['PHP_SELF']), ['link1.php', 'link2.php']) ? 'true' : 'false'; ?>"
                aria-controls="multi">
                <i class="lni lni-layout"></i>
                <span>Multi Level</span>
            </a>
            <ul id="multi"
                class="sidebar-dropdown list-unstyled collapse <?php echo in_array(basename($_SERVER['PHP_SELF']), ['link1.php', 'link2.php']) ? 'show' : ''; ?>"
                data-bs-parent="#sidebar">
                <li class="sidebar-item <?php echo basename($_SERVER['PHP_SELF']) == 'link1.php' ? 'active' : ''; ?>">
                    <a href="link1.php" class="sidebar-link">Link 1</a>
                </li>
                <li class="sidebar-item <?php echo basename($_SERVER['PHP_SELF']) == 'link2.php' ? 'active' : ''; ?>">
                    <a href="link2.php" class="sidebar-link">Link 2</a>
                </li>
            </ul>
        </li>

        <!-- Notification -->
        <li class="sidebar-item <?php echo basename($_SERVER['PHP_SELF']) == 'notification.php' ? 'active' : ''; ?>">
            <a href="notification.php" class="sidebar-link">
                <i class="lni lni-popup"></i>
                <span>Notification</span>
            </a>
        </li>

        <!-- Setting -->
        <li class="sidebar-item <?php echo basename($_SERVER['PHP_SELF']) == 'settings.php' ? 'active' : ''; ?>">
            <a href="settings.php" class="sidebar-link">
                <i class="lni lni-cog"></i>
                <span>Setting</span>
            </a>
        </li>
    </ul>


    <div class="sidebar-footer mb-4">
        <a href="" class="sidebar-link W_logout_but">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>

</aside>

<div class="Right_Side_shayd Disply_none" id="Right_Side_shayd"></div>


<script>
    // Select all sidebar items
    const sidebarItems = document.querySelectorAll('.sidebar-item');

    // Add click event to each sidebar item
    sidebarItems.forEach((item) => {
        item.addEventListener('click', () => {
            // Remove 'active' class from all items
            sidebarItems.forEach((i) => i.classList.remove('active'));

            // Add 'active' class to the clicked item
            item.classList.add('active');
        });
    });
</script>
<script>
    // Function to delete a cookie by name
    function deleteCookie(name) {
        document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }

    // Add event listener to the logout button
    document.querySelector('.W_logout_but').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default link behavior

        // Remove the 'userNypasssailagya' cookie
        deleteCookie('userNypasssailagya');

        // Optionally, redirect the user to the login or home page
        window.location.href = '../index.php'; // Adjust the path to your desired page
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var sidebar = document.getElementById('sidebar');
        var bodyWidth = document.body.offsetWidth; // or document.body.clientWidth

        if (bodyWidth < 800) { // adjust this value as needed
            sidebar.classList.remove('expand');
        } else {
            sidebar.classList.add('expand');
        }
    });

</script>