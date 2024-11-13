<!--Start the session-->
<?php
session_start();
?>
<!--Link config file-->
<?php 
include("config5.php");
?>
<!--Add reviews to the database-->
<?php
$MID = 1;
$CID = $_SESSION['courseID'];
$cmnt = $_POST["comment"];

$sql = "insert into review values('','$CID','$MID','$cmnt');";

if (mysqli_query($conn,$sql)){
    header("refresh:0.2; url = contenet".$CID.".php");
    echo "<script>alert('Review post successfully')</script>";
}
else{
    echo "<script>alert('Erorr in posting review')</script>";
}

mysqli_close($conn);
?>