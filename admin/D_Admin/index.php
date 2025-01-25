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

    <div class="Loader_main d-flex" id="Loader_main">
        <!-- From Uiverse.io by gustavofusco -->
        <svg xmlns="http://www.w3.org/2000/svg" height="200px" width="200px" viewBox="0 0 200 200" class="pencil">
            <defs>
                <clipPath id="pencil-eraser">
                    <rect height="30" width="30" ry="5" rx="5"></rect>
                </clipPath>
            </defs>
            <circle transform="rotate(-113,100,100)" stroke-linecap="round" stroke-dashoffset="439.82"
                stroke-dasharray="439.82 439.82" stroke-width="2" stroke="currentColor" fill="none" r="70"
                class="pencil__stroke"></circle>
            <g transform="translate(100,100)" class="pencil__rotate">
                <g fill="none">
                    <circle transform="rotate(-90)" stroke-dashoffset="402" stroke-dasharray="402.12 402.12"
                        stroke-width="30" stroke="hsl(223,90%,50%)" r="64" class="pencil__body1"></circle>
                    <circle transform="rotate(-90)" stroke-dashoffset="465" stroke-dasharray="464.96 464.96"
                        stroke-width="10" stroke="hsl(223,90%,60%)" r="74" class="pencil__body2"></circle>
                    <circle transform="rotate(-90)" stroke-dashoffset="339" stroke-dasharray="339.29 339.29"
                        stroke-width="10" stroke="hsl(223,90%,40%)" r="54" class="pencil__body3"></circle>
                </g>
                <g transform="rotate(-90) translate(49,0)" class="pencil__eraser">
                    <g class="pencil__eraser-skew">
                        <rect height="30" width="30" ry="5" rx="5" fill="hsl(223,90%,70%)"></rect>
                        <rect clip-path="url(#pencil-eraser)" height="30" width="5" fill="hsl(223,90%,60%)"></rect>
                        <rect height="20" width="30" fill="hsl(223,10%,90%)"></rect>
                        <rect height="20" width="15" fill="hsl(223,10%,70%)"></rect>
                        <rect height="20" width="5" fill="hsl(223,10%,80%)"></rect>
                        <rect height="2" width="30" y="6" fill="hsla(223,10%,10%,0.2)"></rect>
                        <rect height="2" width="30" y="13" fill="hsla(223,10%,10%,0.2)"></rect>
                    </g>
                </g>
                <g transform="rotate(-90) translate(49,-30)" class="pencil__point">
                    <polygon points="15 0,30 30,0 30" fill="hsl(33,90%,70%)"></polygon>
                    <polygon points="15 0,6 30,0 30" fill="hsl(33,90%,50%)"></polygon>
                    <polygon points="15 0,20 10,10 10" fill="hsl(223,10%,10%)"></polygon>
                </g>
            </g>
        </svg>
    </div>

    <div class="wrapper d-none" id="wrapper">

        <?php include("sidenavbar.php"); ?>

        <!--  -->
        <div class="main">
            <section class="dashboard">

                <?php include("topwalasectiond.php"); ?>

                <div class="dash-content p-3">
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

                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- Bootstrap JS & Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="script.js"></script>

</body>

</html>