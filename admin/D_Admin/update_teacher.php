<?php
include 'DB_CONNECT.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $TeacherID = $_POST['TeacherID'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = !empty($_POST['Password']) ? password_hash($_POST['Password'], PASSWORD_BCRYPT) : null;
    $Subject = $_POST['Subject'];
    $Phone = $_POST['Phone'];

    // Prepare the SQL query
    if ($Password) {
        $sql = "UPDATE teacher_info SET Name=?, Email=?, Password=?, Subject=?, Phone=? WHERE TeacherID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $Name, $Email, $Password, $Subject, $Phone, $TeacherID);
    } else {
        $sql = "UPDATE teacher_info SET Name=?, Email=?, Subject=?, Phone=? WHERE TeacherID=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $Name, $Email, $Subject, $Phone, $TeacherID);
    }

    if ($stmt->execute()) {
        echo "Teacher updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: index.php"); // Redirect to the dashboard
    exit();
}
?>
