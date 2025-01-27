<?php
// Include the database connection
include 'DB_CONNECT.php';

// Check if student_id is provided
if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Prepare SQL DELETE query
    $sql = "DELETE FROM Students_info WHERE student_id = ?";
    
    // Use prepared statements for security
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_id);

    if ($stmt->execute()) {
        // Redirect back to the dashboard with a success message
        header("Location: index.php?message=Student+deleted+successfully");
    } else {
        // Redirect back with an error message
        header("Location: index.php?message=Error+deleting+student");
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect if student_id is not set
    header("Location: index.php?message=Invalid+Request");
}
exit;
?>
