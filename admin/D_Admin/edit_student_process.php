<?php
include 'DB_CONNECT.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $semester = $_POST['semester'];
    $phone_number = $_POST['phone_number'];

    $sql = "UPDATE students_info SET 
            student_id='$student_id', 
            name='$name', 
            email='$email', 
            pass='$pass', 
            gender='$gender', 
            semester='$semester', 
            phone_number='$phone_number' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?message=Student updated successfully");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
