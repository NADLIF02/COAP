<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

echo "<h1>Welcome to the Dashboard!</h1>";
echo "<a href='logout.php'>Logout</a> | <a href='view_requests.php'>View Leave Requests</a><br><br>";

include('leave_request_form.html');
?>

