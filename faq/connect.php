<?php
// connect database
$servername='localhost';
$username='root';
$password='';
$database='fittutor';
$conn=new mysqli($servername,$username,$password,$database);

if(!$conn){
    die (mysqli_error($conn));
    echo "<script>alert('connection failed.')</script>";
}else{
}
?>