<?php
// File:db.php

$servername = "localhost";
$username = "root"; // Default MySQL username
$password = ""; // Default MySQL password
$database = "retail management";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
