<!--Start the session-->
<?php
session_start();
?>
<!--Link config file-->
<?php 
include("config5.php");
?>
<!--Delete review that user posted-->
<?php
$id = $_GET["id"];
$CID = $_SESSION['courseID'];

$sql = "delete from review where RID = '$id';";

if (mysqli_query($conn,$sql)){
    header("refresh:0.2; url = contenet".$CID.".php");
    echo "<script>alert('Review Delete successfully')</script>";
    
}
else{
    echo "<script>alert('Erorr in Delete review')</script>";
}

mysqli_close($conn);
?>