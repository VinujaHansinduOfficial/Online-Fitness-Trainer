<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $userid=$_POST['userid'];
    $question=$_POST['question'];
//assign values to database
    $sql="INSERT INTO `questions` (MID,question) VALUES('$userid','$question')";
//execute sql code
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('data inserted successfully')</script>";
        header("location:http://localhost/navigation%20bar/faq/display.php");
        exit;
    }else{
        die (mysqli_error($conn));
    }
}
?>