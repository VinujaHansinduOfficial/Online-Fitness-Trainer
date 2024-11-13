<?php
include 'connect.php';
$id=$_GET['updateid'];
//assign values to database to keep updating data in field
$sql="SELECT * FROM `questions` WHERE QID=$id";
//execute sql code 
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $question=$row['question'];



if(isset($_POST['update'])){
    $question=$_POST['question'];
//assign values to database
    $sql="UPDATE `questions` SET question='$question' WHERE QID=$id";
//execute sql code
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('data updated successfully')</script>";
        header("location:http://localhost/navigation%20bar/faq/display.php");
        exit;
    }else{
        die (mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ask Queestions</title>
        <link rel="stylesheet" href="faq.css?v=<?php echo time(); ?>">
    </head>
<body>
    <div class="bg-image"><!--background image-->
        <!--navigation bar-->
        <nav>
            <div class="navlink" id="navLinks">
                <ul>
                    <li><a  href="">HOME</a></li>
                    <li><a href="">COURSE</a></li>
                    <li><a href="">SHOP</a></li>
                    <li class="active"><a href="/about us.html">ABOUT US</a></li>
                    <li style="float: right;"><img src="../../wallpapers/203536.png" alt="profile" class="profile"></li>
                </ul>
            </div>
        </nav>
        <!--page navigation bar-->
        <nav class="pnav">
            <div class="page-nav">
                <ul>
                    <li><a href="http://localhost/navigation%20bar/about%20us%20page/about%20us.php">About FitTutor</a></li>
                    <li ><a href="http://localhost/navigation%20bar/TRAINER%20DETAILS%20PAGE/OUR%20TRAINERS.html">Our Trainers</a></li>
                    <li class="active"><a href="http://localhost/navigation%20bar/faq/faq.html">FAQ</a></li>
                </ul>
            </div>
        </nav>
        <!--page body-->
        <a href="http://localhost/navigation%20bar/faq/display.php">
            <button type="button" name="askquestion" class="ask" id="edit">Back</button></a>
        <div class="container">
            <h1>Update your Questions</h1>   
            <form  method="POST">
                <br>
                <textarea name="question" id="question" cols="30" rows="10" ><?php echo $question?></textarea>
                <br>
                <button type="submit" id="submit" name="update">Update</button>
            </form>
        </div>
</body>
</html>