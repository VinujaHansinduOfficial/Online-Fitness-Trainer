<!--Start the session-->
<?php
session_start();
?>
<!--Link config file-->
<?php 
include("config.php");
?>
<!--Update review-->
<?php
$id = $_SESSION['reviewID'];
$comment = $_POST["comment"];
$CID = $_SESSION['courseID'];

$sql = "update review 
set Review = '$comment'
where RID = '$id';";

if (mysqli_query($conn,$sql)){
    header("refresh:0.2; url = contenet".$CID.".php");
    echo "<script>alert('Review update successfully')</script>";
}
else{
    echo "<script>alert('Erorr in update review')</script>";
}

mysqli_close($conn);
?>