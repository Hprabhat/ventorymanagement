<?php
session_start();
include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: manage_users.php");
    exit;
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "DELETE FROM users WHERE id='$id'";
if ($conn->query($query) === TRUE) {
    header("Location: manage_users.php");
} else {
    echo "Error: " . $conn->error;
}
?>
