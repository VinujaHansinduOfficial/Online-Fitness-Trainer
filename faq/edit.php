<?php
// connect with database
include 'connect.php';
// get id no from updateid from edit page
$id=$_GET['updateid'];
//assign values to database to keep updating data in field
$sql="SELECT * FROM `questions` WHERE QID=$id";
//execute sql code 
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $question=$row['question'];


// update data in database
if(isset($_POST['update'])){
    $question=$_POST['question'];
    // check if field is empty or not
    if($question!=''){
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
    }else{
        echo "<script>alert('It seems you have nothing to update..')</script>";
        header("Refresh: 0.2; URL=http://localhost/navigation%20bar/faq/display.php");
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
                    <li><a  href="http://localhost/Assignment/FTHome.php">HOME</a></li>
                    <li><a href="http://localhost/Assignment/course_home.php">COURSE</a></li>
                    <li><a href="http://localhost/Assignment/FTShop.php">SHOP</a></li>
                    <li class="active"><a href="http://localhost/Assignment/about us page/about us.php">ABOUT US</a></li>
                    <li style="float: right;"><a href="profile_page.php" class="profilelink" id="profilelink" style="height: 35px;width: 35px;"><img src="picon.png" alt="profile" class="profile"></a></li>s
                </ul>
            </div>
        </nav>
        <!--page navigation bar-->
        <nav class="pnav">
            <div class="page-nav">
                <ul>
                    <li><a href="http://localhost/navigation%20bar/about%20us%20page/about%20us.php">About FitTutor</a></li>
                    <li ><a href="http://localhost/navigation%20bar/TRAINER%20DETAILS%20PAGE/OUR%20TRAINERS.php">Our Trainers</a></li>
                    <li class="active"><a href="http://localhost/navigation%20bar/faq/faq.php">FAQ</a></li>
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