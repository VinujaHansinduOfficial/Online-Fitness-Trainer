<!--Link config file-->
<?php 
include("config.php");
?>
<!--Get IDs from add library button-->
<?php
$cid = $_GET["id"];
$mid = 1;
//enrolled member to course
$sql = "insert into member_courses values('$mid','$cid');";

if (mysqli_query($conn,$sql)){
    header("refresh:0.2; url = contenet".$cid.".php");
    echo "<script>alert('Enrolled to the course successfully')</script>";
}
else{
    echo "<script>alert('Erorr in Enroll')</script>";
}

mysqli_close($conn);
?>