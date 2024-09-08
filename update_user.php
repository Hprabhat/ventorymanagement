<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $query = "UPDATE users SET username='$username', email='$email', role='$role' WHERE id='$id'";
    if ($conn->query($query) === TRUE) {
        header("Location: manage_users.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
