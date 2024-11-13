<?php
    include 'connect.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
        // sql quary
       $sql="DELETE FROM `questions` WHERE QID=$id" ;
    //    execute sql code
       $result=mysqli_query($conn,$sql);
       if($result){
        header("location:http://localhost/navigation%20bar/faq/display.php");
       }else{
        die (mysqli_error($conn));
       }
    }
?>