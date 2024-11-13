<?php
// connect with database
    include 'connect.php';
    // get id from deleteid 
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
        // sql quary
       $sql="DELETE FROM `questions` WHERE QID=$id" ;
    //    execute sql code
       $result=mysqli_query($conn,$sql);
       if($result){
        header("location:http://localhost/Assignment/faq/display.php");
       }else{
        die (mysqli_error($conn));
       }
    }
?>