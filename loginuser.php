<?php
require 'config2.php';

$email = $_POST["uid"];
$password = $_POST["pwd"];

// Validate user credentials
$sql = "SELECT * FROM users WHERE usersEmail = '$email' AND usersPwd = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Login successful, redirect to the user's account page
    header("Location: membership.php");
    exit();
} else {
    // Login failed, display an error message
    echo '<script>alert("Invalid email or password. Please try again.");</script>';
}

$conn->close();
?>
