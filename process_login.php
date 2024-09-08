<?php
session_start(); // Start the session
include 'db.php'; // Include database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape special characters to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to get the user data
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    // If the user exists in the database
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Compare the password directly (without hashing)
        if ($password == $user['password']) {
            // Password is correct, set the session
            $_SESSION['user'] = $username;
            
            // Redirect to the admin dashboard
            header("Location: admin_dashboard.php");
            exit(); // Always exit after header redirection
        } else {
            // Incorrect password
            $_SESSION['login_message'] = "Invalid username or password!";
            header("Location: admin_login.php");
            exit();
        }
    } else {
        // No such user found
        $_SESSION['login_message'] = "Invalid username or password!";
        header("Location: admin_login.php");
        exit();
    }
} else {
    // If not a POST request, redirect to login form
    header("Location: admin_login.php");
    exit();
}
?>
