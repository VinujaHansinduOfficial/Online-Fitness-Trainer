<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="fittutor";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);
// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
// Optional: Display a message if the connection is successful
//echo "Connected successfully";
?>
