<?php
// connect with database
include 'connect.php'; 
// get data from submitquestion page
if(isset($_POST['submit'])){ 
    $userid=$_POST['userid'];
    $question=$_POST['question'];
    // to find if fields are empty. if so stop storing data
    if($userid!="" and $question!=""){
        //assign values to database
        $sql="INSERT INTO `questions` (MID,question) VALUES('$userid','$question')";
        //execute sql code
        $result=mysqli_query($conn,$sql);
        if($result){
            header("location:http://localhost/Assignment/faq/display.php");
            exit;
        }else{
            die (mysqli_error($conn));
        }
    }else{
        echo "<script>alert('Looks like you missed some input fields..')</script>";
        header("Refresh: 0.2; URL=http://localhost/Assignment/faq/display.php");
    }
    

}
?>