<?php
session_start();
include 'db.php';

$student_id = $_POST['student_id'];
$password = $_POST['password'];

$sql = "SELECT * FROM students WHERE student_id='$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $student = $result->fetch_assoc();
    if (password_verify($password, $student['password'])) {
        $_SESSION['student_id'] = $student['id'];
        header("Location: dashboard.php");
    } else {
        echo "Wrong password!";
    }
} else {
    echo "Student not found!";
}
?>