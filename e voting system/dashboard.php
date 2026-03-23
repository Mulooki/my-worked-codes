<?php
session_start();
include 'db.php';
$id = $_SESSION['student_id'];
$sql = "SELECT * FROM students WHERE id='$id'";
$result = $conn->query($sql);
$student = $result->fetch_assoc();
?>
<h2>Welcome <?php echo $student['name']; ?></h2>
<?php if ($student['has_voted'] == 0): ?>
<a href="vote.php">Vote Now</a>
<?php else: ?>
<p>You have already voted.</p>
<?php endif; ?>
<a href="results.php">View Results</a>