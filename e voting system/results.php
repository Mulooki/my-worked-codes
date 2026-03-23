<?php
include 'db.php';
$sql = "SELECT candidates.name, COUNT(votes.id) as total_votes
FROM candidates
LEFT JOIN votes ON candidates.id = votes.candidate_id
GROUP BY candidates.id";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
echo "<h3>".$row['name']." - ".$row['total_votes']." votes</h3>";
}
?>