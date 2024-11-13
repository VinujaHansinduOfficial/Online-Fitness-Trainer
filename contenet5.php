<!--Start the session-->
<?php
session_start();
?>
<!--Add cokkies-->
<?php
$member = $_COOKIE["member_id"];
?>
<!--Link config file-->
<?php
include("config5.php");
?>
<!--Assign data to variables from database-->
<?php
$sql = "select*from courses C,trainer T,trainer_course D,course_plan P 
where P.CID = C.CID and C.CID = D.TID and T.TID = D.CID and C.CID = 5;";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $id = $row["CID"];
        $name = $row["CName"];
        $des = $row["CDescription"];
        $Tname = $row["TName"];
        $CoursePlan = $row["PID"];
    }
}

//assign Course ID to session variable
$_SESSION['courseID'] = $id;

//check whether member already enrolled to the course or not
$enrolled = 0;
$sql = "select*from member_courses where MID = $member;";
$result = $conn->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        if( $row["CID"] == $id){
            $enrolled++;
        }
    }
}
?>
<!DOCTYPE html>
<head>
    <title>Course</title>
    <!--Link CSS-->
    <link rel="stylesheet" href="css/content.css?v=<?php echo time(); ?>">
    <!--function that change main image when click small image-->
    <script>
        function changeImage(trigger){

            switch(trigger){
                case 0 :
                    document.getElementById("mainImage").src = "image/mainteince.jpg";
                    break;
                case 1 :
                    document.getElementById("mainImage").src = "image/mainteince2.jpg";
                    break;
                case 2 :
                    document.getElementById("mainImage").src = "image/mainteince3.jpeg";
                    break;
                case 3 :
                    document.getElementById("mainImage").src = "image/mainteince4.jpg";
                    break;
            }
        }
    </script>
</head>
<body>
    <!--create navigation bar-->
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
    <!--create container to hold image box and detail box-->
    <div class="container">
        <!--create image box-->
		<div class="right-box">
            <!--Display main image-->
			<div class="main-image-box">
			<img src="image/mainteince.jpg" id="mainImage" class="main-image">
			</div>
            <!--Display small images-->
			<div class="small-images">
				<button class="b1" onclick="changeImage(0)"><div class="image-box"><img src="image/mainteince.jpg" class="image"></div></button>
				<button class="b1" onclick="changeImage(1)"><div class="image-box"><img src="image/mainteince2.jpg" class="image"></div></button>
                <button class="b1" onclick="changeImage(2)"><div class="image-box"><img src="image/mainteince3.jpeg" class="image"></div></button>
                <button class="b1" onclick="changeImage(3)"><div class="image-box"><img src="image/mainteince4.jpg" class="image"></div></button>
			</div>
	    </div>
        <!--create details box-->
        <div class="details-box">
            <!--Display read data from database-->
            <h1><?php echo $name;?></h1>
            <p>
                <?php
                echo $des;
                ?>
            </p>
            <span>Trainer Details : </span><a href="TRAINER DETAILS PAGE/OUR TRAINERS.php"><?php echo $Tname;?></a>

            <!--Display reccomended product-->
            <h3>Reccomended Product for better result : </h3>
            <div class="shopcontainer">
                <!--Display shop item-->
                <img src="image/Pre-workout.jpg" alt="Avatar" class="shopimage" style="width:100%">
                <div class="shopmiddle">
                    <!--Hyperlink to shop where above item's content displayed-->
                    <a href="FTItemDescription.php"><button>View product</button></a>
                </div>
            </div><br><br>
            <?php
            $sql = "select*from memberdt where MID = 1";
            $result = $conn->query($sql);
        
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $memberPlan = $row["PID"];
                }
            }

            ?>
            <!--Stop preventing member add same course again to the library and validate membership plan-->
            <span><script>
                //check membership plan is higher than reqired membership plan
                if(<?php echo $memberPlan;?> >= <?Php echo $CoursePlan;?>){
                    if(<?php echo $enrolled;?> > 0){
                        //If member already enrolled to the course, show view libery button
                        //When button clicked member redirect to the user profile library
                        document.write("<a href = \"#\"><button class=\"button\" style = \"background-color: #054d88;\">View library</button></a>");

                    }
                    else{
                        //If member not enrolled to the course, show add libery button
                        //When button clicked member will enroll to the course
                        document.write("<a href = 'enrollcourse.php?id=<?php echo $id;?>'><button class=\"button\">Add to library</button></a>");
                    }
                }
                else{
                    //If membership plan lower than required plan, show upgrade membership plan button
                    document.write("<a href = \"#\"><button class=\"button\" style = \"background-color: blueviolet;\">Upgrade Membership Plan</button></a>");
                }
            </script></span>
        </div>
        
    </div>
    <!--Show futher details about schedule-->
    <div class="details">
        <!--Dislpay course name-->
        <h2>About <?php echo $name;?> :</h2>
        <ol>
            <li>Caloric Balance: To maintain body weight and muscle mass, it's important to achieve a caloric balance. 
                This means consuming an amount of calories that matches your energy expenditure. 
                Calculate your daily caloric needs based on factors such as age, gender, activity level, and metabolism. 
                Monitor your calorie intake and adjust it as needed to maintain your desired weight.
            </li>
            <li>Balanced Diet: Focus on a balanced diet that provides all the essential nutrients your body needs. 
                Include a variety of whole foods such as lean proteins (e.g., chicken, fish, tofu), complex carbohydrates 
                (e.g., whole grains, vegetables), healthy fats (e.g., avocado, nuts, olive oil), and a wide range of fruits and vegetables. 
                Adequate protein intake is especially important for muscle maintenance, so be sure to include lean sources in your meals.
            </li>
            <li>Portion Control: While consuming a balanced diet, pay attention to portion sizes. Even healthy foods can 
                contribute to weight gain if consumed excessively. Use portion control strategies, such as measuring or weighing your food, 
                to ensure you're not overeating. Be mindful of portion sizes when eating out as well.
            </li>
            <li>Regular Resistance Training: Engaging in regular resistance training exercises is crucial for maintaining muscle mass. 
                Include strength training workouts at least two to three times per week. Focus on compound exercises that target 
                multiple muscle groups, such as squats, deadlifts, bench presses, and pull-ups. Gradually increase the intensity, 
                weight, or repetitions over time to provide a stimulus for muscle maintenance and growth.
            </li>
            <li>Cardiovascular Exercise: While resistance training is key for muscle maintenance, 
                incorporating cardiovascular exercise into your routine has numerous benefits. 
                Cardiovascular activities like jogging, cycling, or swimming improve cardiovascular health, 
                enhance overall fitness, and support calorie expenditure. Aim for at least 150 minutes of moderate-intensity 
                aerobic exercise or 75 minutes of vigorous-intensity exercise per week.
            </li>
            <li>Consistency and Progression: Consistency is crucial for maintaining body weight and muscle mass. 
                Stick to a regular exercise routine and maintain a balanced diet over time. 
                Progress your workouts gradually to avoid plateaus and keep challenging your muscles. 
                Increasing the resistance, intensity, or duration of your exercises can help stimulate muscle maintenance.
            </li>
            <li>Hydration: Stay hydrated throughout the day to support overall health and muscle function. 
                Drink water regularly, especially during and after exercise. Hydration helps with digestion, 
                nutrient delivery, and maintaining proper muscle function.
            </li>
            <li>Rest and Recovery: Allow your body enough time for rest and recovery between workouts. 
                Muscle repair and growth occur during periods of rest, so prioritize adequate sleep and take regular rest days. 
                Overtraining can lead to muscle breakdown and hinder progress, so listen to your body and provide it with the rest it needs.
            </li>
            <li>Lifestyle Habits: Adopt healthy lifestyle habits that support your fitness goals. Minimize stress, 
                practice stress management techniques, and prioritize mental well-being. Avoid excessive alcohol consumption, 
                as it can hinder muscle recovery and contribute to weight gain.
            </li>
        </ol>
        <p>Remember that individual factors, such as genetics, age, and metabolism, can influence body weight and muscle maintenance. 
            Adjustments to your routine may be necessary based on your specific needs and goals. 
            It's always beneficial to consult with a healthcare professional or registered dietitian who can provide personalized 
            guidance tailored to your circumstances.
        </p>
    </div>
    <!--begining of reviews panal-->
    <h2 style = "color: white;">Reviews</h2>
    <hr>
    <div class = "textbox">
        <!--Create review box-->
        <form action ="comment.php" method ="POST">
            <div class="row">
                <div class="col-25">
                    <label for="comment" style ="color: white;">Add Review: </label>
                </div>
                <div class="col-75">
                    <textarea id="commt" name="comment" placeholder="Write something.." style="height:100px"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <a href = 'comment.php?id="<?php echo $id;?>"'>
                <input type="submit" value="Post">
                </a>
            </div>
        </form>
    </div>
    <!--Read logged member review and display-->
    <?php
    $sql = "select*from memberdt M, review R 
    where M.MID = R.MID and R.MID = 1 and R.CID = $id order by R.RID desc;";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<div class = \"textbox\">
            <h4 style = \"color: white;\">".$row["MName"]."</h4>
            <div style = \"padding-left: 80px;\"><p style = \"color: white;\">".$row["Review"]."</p>
            <a href = 'editcomment.php?id=$row[RID]&cmnt=$row[Review]'><button>Edit</button></a>
            <a href = 'deletecomment.php?id=$row[RID]'><button>Delete</button></a></div>
            </div>
            <hr>";
        }
    }
    //Read member review and display
    $sql = "select*from memberdt M, review R where M.MID = R.MID and R.MID != 1 and R.CID = $id;";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<div class = \"textbox\">
            <h4 style = \"color: white;\">".$row["MName"]."</h4>
            <div style = \"padding-left: 80px;\"><p style = \"color: white;\">".$row["Review"]."</p></div>
            </div>
            <hr>";
        }
    }else{
        echo "<div class = \"textbox\">
        <p>No Reviews</p>
        </div>
        <hr>";
    }

    mysqli_close($conn)
    ?>
</body>