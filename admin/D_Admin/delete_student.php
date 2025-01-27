<?php
// DB connection
include 'DB_CONNECT.php';

// Check if the studentID is provided
if (isset($_GET['studentID'])) {
    $studentID = $_GET['studentID'];

    // Delete the student from the database
    $sql = "DELETE FROM students_info WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $studentID);
    
    if ($stmt->execute()) {
        // Redirect to the students list page after successful deletion
        header("Location: students.php?message=Student deleted successfully!");
        exit;
    } else {
        echo "Error deleting student.";
    }

    $stmt->close();
} else {
    echo "Student ID not provided.";
}

// Close the database connection
$conn->close();
?>
