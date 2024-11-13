<?php
$servername='localhost';
$username='root';
$password='';
$database='fitnesstrainer';
$conn=new mysqli($servername,$username,$password,$database);

if(!$conn){
    die (mysqli_error($conn));
    echo "<script>alert('connection failed.')</script>";
}else{
}
?>