<?php
session_start();
?>
<?php
// Check if the input has been submitted
if (isset($_POST['value'])) {
    // Retrieve the data from the input
    $data = $_POST['value'];

    $_SESSION["contentID"] = $data;

    // Terminate the script to prevent the rest of the page from being executed
    exit;
}
?>
<!DOCTYPE html>
<head>
    <title>Course</title>
    <!--Link CSS-->
    <link rel="stylesheet" href="css/course.css?v=<?php echo time(); ?>">
    <!--Identified each cards and send value to the php-->
    <script>
        function sendData(number) {
            // JavaScript variable
            var value;
            //check wich button is clicked
            if (number == 1 ){
                value = 1;
            }
            else if (number == 2){
                value = 2;
            }
            else if (number == 3){
                value = 3;
            }
            else if (number == 4){
                value = 4;
            }

            // Create an request
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Response from PHP script
                    console.log(this.responseText);
                }
            };
            xhttp.open("POST", "", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("value=" + encodeURIComponent(value));
        }
    </script>
</head>
<body>
    <!--Create navigation bar-->
    <nav>
        <div class="navlink" id="navLinks">
            <ul>
                <li><a  href="FTHome.php">HOME</a></li>
                <li class="active"><a href="course_home.php">COURSE</a></li>
                <li><a href="FTShop.php">SHOP</a></li>
                <li><a href="about us page/about us.php">ABOUT US</a></li>
                <li style="float: right;"><a href="profile_page.php" class="profilelink" id="profilelink" style="height: 35px;width: 35px;"><img src="noprofil.jpg" alt="profile" class="profile"></a></li>
            </ul>
        </div>
    </nav>
    <br>
    <!--Display discription about fitness desires-->
    <center class="textbox">
        <h1>Choose fitness type you desired</h1>
        <p>Fitness can be broadly categorized into several types, 
            each emphasizing different aspects of physical well-being. 
            Aerobic fitness focuses on cardiovascular endurance and overall stamina, 
            incorporating activities like running, swimming, or cycling. 
            Strength training aims to increase muscle mass and strength, 
            involving exercises such as weightlifting or resistance training. 
            Flexibility exercises enhance joint mobility and range of motion, 
            including activities like yoga or stretching routines. 
            Functional fitness emphasizes movements that mimic real-life activities, 
            enhancing balance, coordination, and agility. 
            Lastly, mind-body fitness, such as Pilates or Tai Chi, 
            combines physical movement with mental focus and relaxation techniques to promote overall harmony and mindfulness. 
            With these diverse fitness types, individuals can choose the approach that aligns best with their goals and preferences.</p>
    </center><br><br>
    <center>
        <!--Display First tab-->
		<div class="card card1">
            <div class ="details">
                <p>Striving for a fit and toned physique for improved appearance and confidence.</p>
            </div><br><br><br><br><br>
            <!--Hyperlink to schedule page-->
            <a href="shedules.php">
            <button class="button" onclick="sendData(1)"><span>Get Started</span></button>
            </a>
        </div>
        <!--Display second tab-->
        <div class="card card2">
            <div class ="details">
                <p>Pursuing fitness for overall health, weight management, and vitality.</p>
            </div><br><br><br><br><br>
            <!--Hyperlink to schedule page-->
            <a href="shedules.php">
            <button class="button" onclick="sendData(2)"><span>Get Started</span></button>
            </a>
        </div>
        <!--Display third tab-->
        <div class="card card3">
            <div class ="details">
                <p>Seeking to improve athletic performance in specific sports or activities.</p>
            </div><br><br><br><br><br>
            <!--Hyperlink to schedule page-->
            <a href="shedules.php">
            <button class="button" onclick="sendData(3)"><span>Get Started</span></button>
            </a>
        </div>
        <!--Display forth tab-->
        <div class="card card4">
            <div class ="details">
                <p>Focusing on building strength, flexibility, and mobility for everyday tasks and physical independence.</p>
            </div><br><br><br><br>
            <!--Hyperlink to schedule page-->
            <a href="shedules.php">
            <button class="button" onclick="sendData(4)"><span>Get Started</span></button>
            </a>
        </div>
	</center><br><br><br><br>
</body>