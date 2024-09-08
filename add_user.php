<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "INSERT INTO users (username, email, role, password) VALUES ('$username', '$email', '$role', '$password')";
    if ($conn->query($query) === TRUE) {
        header("Location: manage_users.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
