<?php
session_start();
include 'db.php';
$candidates = $conn->query("SELECT * FROM candidates");
while ($row = $candidates->fetch_assoc()) {
echo "<form method='POST' action='submit_vote.php'>";
echo "<h3>".$row['name']."</h3>";
echo "<input type='hidden' name='candidate_id' value='".$row['id']."'>";
echo "<button type='submit'>Vote</button>";
echo "</form>";
}
?>