<?php
session_start();
include 'db.php';

$student_id = $_SESSION['student_id'];
$candidate_id = $_POST['candidate_id'];

$check = $conn->query("SELECT has_voted FROM students WHERE id='$student_id'");
$row = $check->fetch_assoc();

if ($row['has_voted'] == 1) {
echo "You already voted!";
exit();
}

$conn->query("INSERT INTO votes (student_id, candidate_id) VALUES ('$student_id', '$candidate_id')");
$conn->query("UPDATE students SET has_voted=1 WHERE id='$student_id'");

echo "Vote submitted successfully!";
?>