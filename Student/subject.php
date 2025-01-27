<?php
session_start();
if (!isset($_SESSION['student_name']) || $_SESSION['role'] !== 'student') {
    header("Location: ./index.php");
    exit();
}
?>
<!-- fetch sucject books -->
<?php

include "admin/D_Admin/Books.php";

$storedSemester = $_SESSION['Semester'];
$subjects = []; // Initialize an empty array to hold subjects

// Determine the subjects based on the stored semester
if ($storedSemester == 1) {
    $subjects = $semester1;
} elseif ($storedSemester == 2) {
    $subjects = $semester2;
} elseif ($storedSemester == 3) {
    $subjects = $semester3;
} elseif ($storedSemester == 4) {
    $subjects = $semester4;
}

// Separate subjects into individual variables
list($subject1, $subject2, $subject3) = $subjects;

// Output each subject
// echo "Subject 1: $subject1\n";
// echo "Subject 2: $subject2\n";
// echo "Subject 3: $subject3\n";

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
    <style>
        #pills-tab li button#pills-none-tab{
            display: none !important;
        }
    </style>
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
                            <!-- <h5>Subjects for Semester <?php echo $storedSemester; ?></h5> -->
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-<?php echo $subject1; ?>-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-<?php echo $subject1; ?>"
                                        type="button" role="tab" aria-controls="pills-<?php echo $subject1; ?>"
                                        aria-selected="true"><?php echo $subject1; ?></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-<?php echo $subject2; ?>-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-<?php echo $subject2; ?>"
                                        type="button" role="tab" aria-controls="pills-<?php echo $subject2; ?>"
                                        aria-selected="false"><?php echo $subject2; ?></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-<?php echo $subject3; ?>-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-<?php echo $subject3; ?>"
                                        type="button" role="tab" aria-controls="pills-<?php echo $subject3; ?>"
                                        aria-selected="false"><?php echo $subject3; ?></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-<?php
                                    echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                    ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php
                                    echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                    ?>" type="button" role="tab" aria-controls="pills-<?php
                                    echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                    ?>" aria-selected="false">
                                        <?php
                                        echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                        ?>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-<?php echo $subject1; ?>"
                                    role="tabpanel" aria-labelledby="pills-<?php echo $subject1; ?>-tab">
                                    <!-- OS Accordion -->
                                    <div class="bg-light rounded h-100 p-4">
                                        <div class="accordion accordion-flush"
                                            id="accordionFlushExample-<?php echo $subject1; ?>">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingOne-<?php echo $subject1; ?>">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseOne-<?php echo $subject1; ?>"
                                                        aria-expanded="true"
                                                        aria-controls="flush-collapseOne-<?php echo $subject1; ?>">
                                                        LO-1
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne-<?php echo $subject1; ?>"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="flush-headingOne-<?php echo $subject1; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject1; ?>">
                                                    <div class="accordion-body">
                                                        Lorem et ea ea consetetur voluptua duo et aliquyam sanctus sit.
                                                        Et dolore at erat amet et diam labore lorem dolores. Erat amet
                                                        stet at dolore dolor ea invidunt, justo nonumy justo takimata
                                                        magna.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingTwo-<?php echo $subject1; ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseTwo-<?php echo $subject1; ?>"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapseTwo-<?php echo $subject1; ?>">
                                                        LO-2
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo-<?php echo $subject1; ?>"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingTwo-<?php echo $subject1; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject1; ?>">
                                                    <div class="accordion-body">
                                                        Sea diam dolore aliquyam aliquyam diam et consetetur et. Accusam
                                                        amet no invidunt invidunt et consetetur, magna ut nonumy kasd
                                                        erat tempor dolor et.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingThree-<?php echo $subject1; ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseThree-<?php echo $subject1; ?>"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapseThree-<?php echo $subject1; ?>">
                                                        LO-3
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree-<?php echo $subject1; ?>"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingThree-<?php echo $subject1; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject1; ?>">
                                                    <div class="accordion-body">
                                                        Sea sea sit sanctus magna gubergren kasd, magna justo ea lorem
                                                        lorem. Elitr aliquyam ipsum clita consetetur duo at nonumy
                                                        invidunt, invidunt eos dolore vero sit amet amet magna tempor
                                                        clita.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingFour-<?php echo $subject1; ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour-<?php echo $subject1; ?>"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapseFour-<?php echo $subject1; ?>">
                                                        LO-4
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseFour-<?php echo $subject1; ?>"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingFour-<?php echo $subject1; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject1; ?>">
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
                                <div class="tab-pane fade" id="pills-<?php echo $subject2; ?>" role="tabpanel"
                                    aria-labelledby="pills-<?php echo $subject2; ?>-tab">
                                    <!-- App Dev Accordion -->
                                    <div class="bg-light rounded h-100 p-4">
                                        <div class="accordion accordion-flush"
                                            id="accordionFlushExample-<?php echo $subject2; ?>">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingOne-<?php echo $subject2; ?>">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseOne-<?php echo $subject2; ?>"
                                                        aria-expanded="true"
                                                        aria-controls="flush-collapseOne-<?php echo $subject2; ?>">
                                                        LO-1
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne-<?php echo $subject2; ?>"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="flush-headingOne-<?php echo $subject2; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject2; ?>">
                                                    <div class="accordion-body">
                                                        Lorem et ea ea consetetur voluptua duo et aliquyam sanctus sit.
                                                        Et dolore at erat amet et diam labore lorem dolores. Erat amet
                                                        stet at dolore dolor ea invidunt, justo nonumy justo takimata
                                                        magna.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingTwo-<?php echo $subject2; ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseTwo-<?php echo $subject2; ?>"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapseTwo-<?php echo $subject2; ?>">
                                                        LO-2
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo-<?php echo $subject2; ?>"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingTwo-<?php echo $subject2; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject2; ?>">
                                                    <div class="accordion-body">
                                                        Sea diam dolore aliquyam aliquyam diam et consetetur et. Accusam
                                                        amet no invidunt invidunt et consetetur, magna ut nonumy kasd
                                                        erat tempor dolor et.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingThree-<?php echo $subject2; ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseThree-<?php echo $subject2; ?>"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapseThree-<?php echo $subject2; ?>">
                                                        LO-3
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree-<?php echo $subject2; ?>"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingThree-<?php echo $subject2; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject2; ?>">
                                                    <div class="accordion-body">
                                                        Sea sea sit sanctus magna gubergren kasd, magna justo ea lorem
                                                        lorem. Elitr aliquyam ipsum clita consetetur duo at nonumy
                                                        invidunt, invidunt eos dolore vero sit amet amet magna tempor
                                                        clita.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingFour-<?php echo $subject2; ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour-<?php echo $subject2; ?>"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapseFour-<?php echo $subject2; ?>">
                                                        LO-4
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseFour-<?php echo $subject2; ?>"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingFour-<?php echo $subject2; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject2; ?>">
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
                                <div class="tab-pane fade" id="pills-<?php echo $subject3; ?>" role="tabpanel"
                                    aria-labelledby="pills-<?php echo $subject3; ?>-tab">
                                    <!-- <?php echo $subject3; ?> Accordion -->
                                    <div class="bg-light rounded h-100 p-4">
                                        <div class="accordion accordion-flush"
                                            id="accordionFlushExample-<?php echo $subject3; ?>">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingOne-<?php echo $subject3; ?>">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseOne-<?php echo $subject3; ?>"
                                                        aria-expanded="true"
                                                        aria-controls="flush-collapseOne-<?php echo $subject3; ?>">
                                                        LO-1
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne-<?php echo $subject3; ?>"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="flush-headingOne-<?php echo $subject3; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject3; ?>">
                                                    <div class="accordion-body">
                                                        Lorem et ea ea consetetur voluptua duo et aliquyam sanctus sit.
                                                        Et dolore at erat amet et diam labore lorem dolores.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingTwo-<?php echo $subject3; ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseTwo-<?php echo $subject3; ?>"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapseTwo-<?php echo $subject3; ?>">
                                                        LO-2
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo-<?php echo $subject3; ?>"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingTwo-<?php echo $subject3; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject3; ?>">
                                                    <div class="accordion-body">
                                                        Sea diam dolore aliquyam aliquyam diam et consetetur et. Accusam
                                                        amet no invidunt invidunt et consetetur.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingThree-<?php echo $subject3; ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseThree-<?php echo $subject3; ?>"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapseThree-<?php echo $subject3; ?>">
                                                        LO-3
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree-<?php echo $subject3; ?>"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingThree-<?php echo $subject3; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject3; ?>">
                                                    <div class="accordion-body">
                                                        Sea sea sit sanctus magna gubergren kasd, magna justo ea lorem
                                                        lorem.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="flush-headingFour-<?php echo $subject3; ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapseFour-<?php echo $subject3; ?>"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapseFour-<?php echo $subject3; ?>">
                                                        LO-4
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseFour-<?php echo $subject3; ?>"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingFour-<?php echo $subject3; ?>"
                                                    data-bs-parent="#accordionFlushExample-<?php echo $subject3; ?>">
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
                                <div class="tab-pane fade" id="pills-<?php
                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                ?>" role="tabpanel" aria-labelledby="pills-<?php
                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                ?>-tab">
                                    <!-- <?php
                                    echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                    ?> Accordion -->
                                    <div class="bg-light rounded h-100 p-4">
                                        <div class="accordion accordion-flush" id="accordionFlushExample-<?php
                                        echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                        ?>">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-<?php
                                                        echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                        ?>" aria-expanded="true" aria-controls="flush-collapseOne-<?php
                                                        echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                        ?>">
                                                        LO-1
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>" data-bs-parent="#accordionFlushExample-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>">
                                                    <div class="accordion-body">
                                                        Lorem et ea ea consetetur voluptua duo et aliquyam sanctus sit.
                                                        Et dolore at erat amet et diam labore lorem dolores.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingTwo-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo-<?php
                                                        echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                        ?>" aria-expanded="false" aria-controls="flush-collapseTwo-<?php
                                                        echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                        ?>">
                                                        LO-2
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>" data-bs-parent="#accordionFlushExample-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>">
                                                    <div class="accordion-body">
                                                        Sea diam dolore aliquyam aliquyam diam et consetetur et. Accusam
                                                        amet no invidunt invidunt et consetetur.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingThree-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseThree-<?php
                                                        echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                        ?>" aria-expanded="false" aria-controls="flush-collapseThree-<?php
                                                        echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                        ?>">
                                                        LO-3
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseThree-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingThree-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>" data-bs-parent="#accordionFlushExample-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>">
                                                    <div class="accordion-body">
                                                        Sea sea sit sanctus magna gubergren kasd, magna justo ea lorem
                                                        lorem.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingFour-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseFour-<?php
                                                        echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                        ?>" aria-expanded="false" aria-controls="flush-collapseFour-<?php
                                                        echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                        ?>">
                                                        LO-4
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseFour-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingFour-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>" data-bs-parent="#accordionFlushExample-<?php
                                                echo isset($subject4) && !empty($subject4) ? $subject4 : 'none';
                                                ?>">
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
    <!-- <script src="../Teacher/js/for_Subject.php"></script> -->
</body>

</html>