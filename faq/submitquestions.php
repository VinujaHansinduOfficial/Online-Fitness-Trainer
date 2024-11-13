<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ask Questions</title>
        <link rel="stylesheet" href="faq.css?v=<?php echo time(); ?>">
    </head>
<body>
    <!--background image-->
    <div class="bg-image">
        <!--navigation bar-->
        <nav>
            <div class="navlink" id="navLinks">
                <ul>
                    <li><a  href="http://localhost/Assignment/FTHome.php">HOME</a></li>
                    <li><a href="http://localhost/Assignment/course_home.php">COURSE</a></li>
                    <li><a href="http://localhost/Assignment/FTShop.php">SHOP</a></li>
                    <li class="active"><a href="http://localhost/Assignment/about us page/about us.php">ABOUT US</a></li>
                    <li style="float: right;"><a href="profile_page.php" class="profilelink" id="profilelink" style="height: 35px;width: 35px;"><img src="noprofil.jpg" alt="profile" class="profile"></a></li>
                </ul>
            </div>
        </nav>
        <!--page navigation bar-->
        <nav class="pnav">
            <div class="page-nav">
                <ul>
                    <li><a href="http://localhost/Assignment/about%20us%20page/about%20us.php">About FitTutor</a></li>
                    <li ><a href="http://localhost/Assignment/TRAINER%20DETAILS%20PAGE/OUR%20TRAINERS.php">Our Trainers</a></li>
                    <li class="active"><a href="http://localhost/Assignment/faq/faq.php">FAQ</a></li>
                </ul>
            </div>
        </nav>
        <!--page body-->
        <div class="container">
            <h1>Have any Questions?</h1>
            <h3>Ask away...We are Happy to give you Answers...</h3>
            <form action="http://localhost/Assignment/faq/submitqst.php" method="POST">
                <input type="text" id="userid" name="userid" placeholder="Membership ID">
                <br>
                <textarea name="question" id="question" cols="30" rows="10" placeholder="Tell Us Your Conserns..."></textarea>
                <br>
                <button type="submit" id="submit" name="submit">Submit</button>
            </form>
        </div>
</body>
</html>