<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'teacher') {
    header("Location: indoex.php");
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacher Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
        <p>This is the teacher dashboard.</p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>

</html>
