<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include('db_connect.php'); // Supposant que vous ayez un fichier pour la connexion à la base de données

$query = "SELECT users.username, requests.start_date, requests.end_date, requests.status FROM requests JOIN users ON requests.user_id = users.id";
$result = $db->query($query);

echo "<h1>Leave Requests</h1>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>Employee</th><th>Start Date</th><th>End Date</th><th>Status</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row['username']) . "</td><td>" . htmlspecialchars($row['start_date']) . "</td><td>" . htmlspecialchars($row['end_date']) . "</td><td>" . htmlspecialchars($row['status']) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No leave requests found.";
}
$result->close();
$db->close();
?>

