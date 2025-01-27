<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'student') {
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
    <!--  -->
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


            <!-- ========== Start Section ========== -->
            <div class="container-fluid pt-4 px-4">
                <div class="row bg-light rounded mx-0">
                    <div class="">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Select subject </h6>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-os-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-os" type="button" role="tab" aria-controls="pills-os"
                                        aria-selected="true">Operating System</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-app-dev-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-app-dev" type="button" role="tab"
                                        aria-controls="pills-app-dev" aria-selected="false">Application
                                        Development</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-Iot-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-Iot" type="button" role="tab" aria-controls="pills-Iot"
                                        aria-selected="false">Iot</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-Dsa-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-Dsa" type="button" role="tab" aria-controls="pills-Dsa"
                                        aria-selected="false">Dsa</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-os" role="tabpanel"
                                    aria-labelledby="pills-os-tab">
                                    <!-- OS Accordion -->
                                    <div class="bg-light rounded h-100 p-4">
                                        <div class="accordion accordion-flush" id="accordionFlushExample-os">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne-os">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-os"
                                                        aria-expanded="true" aria-controls="flush-collapseOne-os">
                                                        LO-1
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne-os" class="accordion-collapse collapse show"
                                                    aria-labelledby="flush-headingOne-os"
                                                    data-bs-parent="#accordionFlushExample-os">
                                                    <div class="accordion-body">
                                                        Lorem et ea ea consetetur voluptua duo et aliquyam sanctus sit.
                                                        Et dolore at erat amet et diam labore lorem dolores. Erat amet
                                                        stet at dolore dolor ea invidunt, justo nonumy justo takimata
                                                        magna.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingTwo-os">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo-os"
                                                        aria-expanded="false" aria-controls="flush-collapseTwo-os">
                                                        LO-2
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo-os" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingTwo-os"
                                                    data-bs-parent="#accordionFlushExample-os">
                                                    <div class="accordion-body">
                                                        Sea diam dolore aliquyam aliquyam diam et consetetur et. Accusam
                                                        amet no invidunt invidunt et consetetur, magna ut nonumy kasd
                                                        erat tempor dolor et.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingThree-os">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseThree-os" aria-expanded="false"
                                                        aria-controls="flush-collapseThree-os">
                                                        LO-3
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree-os" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingThree-os"
                                                    data-bs-parent="#accordionFlushExample-os">
                                                    <div class="accordion-body">
                                                        Sea sea sit sanctus magna gubergren kasd, magna justo ea lorem
                                                        lorem. Elitr aliquyam ipsum clita consetetur duo at nonumy
                                                        invidunt, invidunt eos dolore vero sit amet amet magna tempor
                                                        clita.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingFour-os">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour-os" aria-expanded="false"
                                                        aria-controls="flush-collapseFour-os">
                                                        LO-4
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseFour-os" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingFour-os"
                                                    data-bs-parent="#accordionFlushExample-os">
                                                    <div class="accordion-body">
                                                        This is the content for the 4th accordion item. You can add any
                                                        content you wish here, such as text, images, or other HTML
                                                        elements.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-app-dev" role="tabpanel"
                                    aria-labelledby="pills-app-dev-tab">
                                    <!-- App Dev Accordion -->
                                    <div class="bg-light rounded h-100 p-4">
                                        <div class="accordion accordion-flush" id="accordionFlushExample-app-dev">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne-app-dev">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseOne-app-dev" aria-expanded="true"
                                                        aria-controls="flush-collapseOne-app-dev">
                                                        LO-1
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne-app-dev"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="flush-headingOne-app-dev"
                                                    data-bs-parent="#accordionFlushExample-app-dev">
                                                    <div class="accordion-body">
                                                        Lorem et ea ea consetetur voluptua duo et aliquyam sanctus sit.
                                                        Et dolore at erat amet et diam labore lorem dolores. Erat amet
                                                        stet at dolore dolor ea invidunt, justo nonumy justo takimata
                                                        magna.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingTwo-app-dev">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseTwo-app-dev"
                                                        aria-expanded="false" aria-controls="flush-collapseTwo-app-dev">
                                                        LO-2
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo-app-dev" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingTwo-app-dev"
                                                    data-bs-parent="#accordionFlushExample-app-dev">
                                                    <div class="accordion-body">
                                                        Sea diam dolore aliquyam aliquyam diam et consetetur et. Accusam
                                                        amet no invidunt invidunt et consetetur, magna ut nonumy kasd
                                                        erat tempor dolor et.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingThree-app-dev">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseThree-app-dev"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapseThree-app-dev">
                                                        LO-3
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree-app-dev"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingThree-app-dev"
                                                    data-bs-parent="#accordionFlushExample-app-dev">
                                                    <div class="accordion-body">
                                                        Sea sea sit sanctus magna gubergren kasd, magna justo ea lorem
                                                        lorem. Elitr aliquyam ipsum clita consetetur duo at nonumy
                                                        invidunt, invidunt eos dolore vero sit amet amet magna tempor
                                                        clita.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingFour-app-dev">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour-app-dev"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapseFour-app-dev">
                                                        LO-4
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseFour-app-dev" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingFour-app-dev"
                                                    data-bs-parent="#accordionFlushExample-app-dev">
                                                    <div class="accordion-body">
                                                        This is the content for the 4th accordion item. You can add any
                                                        content you wish here, such as text, images, or other HTML
                                                        elements.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-Iot" role="tabpanel"
                                    aria-labelledby="pills-Iot-tab">
                                    <!-- Iot Accordion -->
                                    <div class="bg-light rounded h-100 p-4">
                                        <div class="accordion accordion-flush" id="accordionFlushExample-Iot">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne-Iot">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseOne-Iot" aria-expanded="true"
                                                        aria-controls="flush-collapseOne-Iot">
                                                        LO-1
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne-Iot" class="accordion-collapse collapse show"
                                                    aria-labelledby="flush-headingOne-Iot"
                                                    data-bs-parent="#accordionFlushExample-Iot">
                                                    <div class="accordion-body">
                                                        Lorem et ea ea consetetur voluptua duo et aliquyam sanctus sit.
                                                        Et dolore at erat amet et diam labore lorem dolores.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingTwo-Iot">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseTwo-Iot" aria-expanded="false"
                                                        aria-controls="flush-collapseTwo-Iot">
                                                        LO-2
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo-Iot" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingTwo-Iot"
                                                    data-bs-parent="#accordionFlushExample-Iot">
                                                    <div class="accordion-body">
                                                        Sea diam dolore aliquyam aliquyam diam et consetetur et. Accusam
                                                        amet no invidunt invidunt et consetetur.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingThree-Iot">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseThree-Iot" aria-expanded="false"
                                                        aria-controls="flush-collapseThree-Iot">
                                                        LO-3
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree-Iot" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingThree-Iot"
                                                    data-bs-parent="#accordionFlushExample-Iot">
                                                    <div class="accordion-body">
                                                        Sea sea sit sanctus magna gubergren kasd, magna justo ea lorem
                                                        lorem.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingFour-Iot">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour-Iot" aria-expanded="false"
                                                        aria-controls="flush-collapseFour-Iot">
                                                        LO-4
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseFour-Iot" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingFour-Iot"
                                                    data-bs-parent="#accordionFlushExample-Iot">
                                                    <div class="accordion-body">
                                                        This is the content for the 4th accordion item. You can add any
                                                        content you wish here, such as text, images, or other HTML
                                                        elements.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-Dsa" role="tabpanel"
                                    aria-labelledby="pills-Dsa-tab">
                                    <!-- Dsa Accordion -->
                                    <div class="bg-light rounded h-100 p-4">
                                        <div class="accordion accordion-flush" id="accordionFlushExample-Dsa">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne-Dsa">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseOne-Dsa" aria-expanded="true"
                                                        aria-controls="flush-collapseOne-Dsa">
                                                        LO-1
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne-Dsa" class="accordion-collapse collapse show"
                                                    aria-labelledby="flush-headingOne-Dsa"
                                                    data-bs-parent="#accordionFlushExample-Dsa">
                                                    <div class="accordion-body">
                                                        Lorem et ea ea consetetur voluptua duo et aliquyam sanctus sit.
                                                        Et dolore at erat amet et diam labore lorem dolores.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingTwo-Dsa">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseTwo-Dsa" aria-expanded="false"
                                                        aria-controls="flush-collapseTwo-Dsa">
                                                        LO-2
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo-Dsa" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingTwo-Dsa"
                                                    data-bs-parent="#accordionFlushExample-Dsa">
                                                    <div class="accordion-body">
                                                        Sea diam dolore aliquyam aliquyam diam et consetetur et. Accusam
                                                        amet no invidunt invidunt et consetetur.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingThree-Dsa">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseThree-Dsa" aria-expanded="false"
                                                        aria-controls="flush-collapseThree-Dsa">
                                                        LO-3
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree-Dsa" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingThree-Dsa"
                                                    data-bs-parent="#accordionFlushExample-Dsa">
                                                    <div class="accordion-body">
                                                        Sea sea sit sanctus magna gubergren kasd, magna justo ea lorem
                                                        lorem.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingFour-Dsa">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour-Dsa" aria-expanded="false"
                                                        aria-controls="flush-collapseFour-Dsa">
                                                        LO-4
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseFour-Dsa" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingFour-Dsa"
                                                    data-bs-parent="#accordionFlushExample-Dsa">
                                                    <div class="accordion-body">
                                                        This is the content for the 4th accordion item. You can add any
                                                        content you wish here, such as text, images, or other HTML
                                                        elements.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ========== End Section ========== -->



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
</body>

</html>