<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include('db_connect.php'); // Supposant que vous ayez un fichier pour la connexion à la base de données

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$user_id = $_SESSION['user_id'];

$stmt = $db->prepare("INSERT INTO requests (user_id, start_date, end_date, status) VALUES (?, ?, ?, 'pending')");
$stmt->bind_param("iss", $user_id, $start_date, $end_date);
$stmt->execute();
$stmt->close();
$db->close();

header("Location: dashboard.php");
exit;
?>

