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
                <li class="sidebar-item active">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Teachers</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Students</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Auth</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Login</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Register</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
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


        <!--  -->
        <div class="main p-3">
            <section class="dashboard">
                <div class="top">

                    <i class="lanlymera bi bi-list sidebar-toggle"></i>


                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Search here...">
                    </div>

                    <img src="images/profile.png" alt="pic">
                </div>

                <div class="dash-content">
                    <div class="overview">
                        <div class="title">
                            <i class="bi bi-speedometer2"></i>
                            <span class="text">Dashboard</span>
                        </div>

                        <div class="boxes">
                            <div class="box box1">
                                <i class="bi bi-hand-thumbs-up"></i>
                                <span class="text">Total Students</span>
                                <span class="number">50</span>
                            </div>
                            <div class="box box2">
                                <i class="bi bi-chat-dots"></i>
                                <span class="text">Total Teacher</span>
                                <span class="number">20</span>
                            </div>
                            <div class="box box3">
                                <i class="bi bi-share"></i>
                                <span class="text">Total</span>
                                <span class="number">100</span>
                            </div>
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
    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="script.js"></script>
    <script>
        const lanlymera = document.querySelector(".lanlymera");

        lanlymera.addEventListener("click", function () {
            document.querySelector("#sidebar").classList.toggle("expand");
        });

    </script>
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
</body>

</html>