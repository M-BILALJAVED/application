<?php
// DB connection
include 'DB_CONNECT.php';

// Check if the teacherID is provided
if (isset($_GET['teacherID'])) {
    $teacherID = $_GET['teacherID'];

    // Delete the teacher from the database
    $sql = "DELETE FROM teacher_info WHERE TeacherID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $teacherID);
    
    if ($stmt->execute()) {
        echo "Teacher deleted successfully!";
        header("Location: teachers.php"); // Redirect to the teachers list page
    } else {
        echo "Error deleting teacher.";
    }

    $stmt->close();
} else {
    echo "Teacher ID not found.";
}
