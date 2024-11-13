<!--Start the session-->
<?php
session_start();
?>
<!--Link config file-->
<?php
include("config.php")
?>
<!--assign data to variables-->
<?php
$_SESSION['reviewID'] = $_GET['id'];
$comment_name = $_GET['cmnt'];
?>
<!DOCTYPE html>
<head>
    <title>Course</title>
    <!--Link CSS-->
    <link rel="stylesheet" href="css/content.css">
</head>
<body>
    <!--Create navigation bar-->
    <nav>
        <div class="navlink" id="navLinks">
            <ul>
                <li><a  href="">HOME</a></li>
                <li class="active"><a href="course_home.html">COURSE</a></li>
                <li><a href="">SHOP</a></li>
                <li><a href="">ABOUT US</a></li>
                <li style="float: right;"><img src="image/logo.png" alt="profile" class="profile" onclick=></li>
            </ul>
        </div>
    </nav>
    <br>
    <!--Create review box to re-post the review-->
    <div class = "textbox">
        <!--Create review box-->
        <form action ="submiteditcomment.php" method ="POST">
            <div class="row">
                <div class="col-25">
                    <label for="comment" style ="color: white;">Update Review: </label>
                </div>
                <div class="col-75">
                    <textarea id="commt" name="comment" placeholder="Write something.." style="height:100px"><?php echo $comment_name;?></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <input type="submit" value="Update post">
            </div>
        </form>
    </div>