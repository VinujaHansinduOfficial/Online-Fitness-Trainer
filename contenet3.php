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
where P.CID = C.CID and C.CID = D.TID and T.TID = D.CID and C.CID = 3;";
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
                    document.getElementById("mainImage").src = "image/weightgain.jpg";
                    break;
                case 1 :
                    document.getElementById("mainImage").src = "image/weightgain2.jpg";
                    break;
                case 2 :
                    document.getElementById("mainImage").src = "image/weightgain3.jpg";
                    break;
                case 3 :
                    document.getElementById("mainImage").src = "image/weightgain4.jpg";
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
			<img src="image/weightgain.jpg" id="mainImage" class="main-image">
			</div>
            <!--Display small images-->
			<div class="small-images">
				<button class="b1" onclick="changeImage(0)"><div class="image-box"><img src="image/weightgain.jpg" class="image"></div></button>
				<button class="b1" onclick="changeImage(1)"><div class="image-box"><img src="image/weightgain2.jpg" class="image"></div></button>
                <button class="b1" onclick="changeImage(2)"><div class="image-box"><img src="image/weightgain3.jpg" class="image"></div></button>
                <button class="b1" onclick="changeImage(3)"><div class="image-box"><img src="image/weightgain4.jpg" class="image"></div></button>
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
                <img src="image/Massgain.jpg" alt="Avatar" class="shopimage" style="width:100%">
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
            <p>Weight gain occurs when you consume more calories than your 
                body needs for daily activities and metabolism. 
                The excess calories are stored as fat, 
                leading to an increase in overall body weight. 
                This can happen due to several factors, 
                including a high-calorie diet, sedentary lifestyle, 
                certain medications, or genetic predisposition.
            </p>
            <p>To promote weight gain in a healthy manner, it's important to focus on several key aspects:</p>
            <ol>
                <li>Caloric Surplus: To gain weight, you need to consume more calories than your body burns. 
                    This is typically achieved by consuming a surplus of 250-500 calories per day. However, 
                    it's important to strike a balance and avoid excessive caloric intake, 
                    as it can lead to unhealthy weight gain or other health issues. 
                    Consulting with a registered dietitian or nutritionist can help create a personalized 
                    plan based on your specific needs and goals.
                </li>
                <li>Nutrient-Dense Foods: While it may be tempting to consume high-calorie junk foods, 
                    it's crucial to prioritize nutrient-dense foods that provide essential vitamins, minerals, 
                    and macronutrients. Include a variety of whole grains, lean proteins, fruits, vegetables, 
                    healthy fats, and dairy or dairy alternatives in your diet.
                </li>
                <li>Resistance Training: Engaging in regular resistance training exercises, such as weightlifting 
                    or bodyweight exercises, can help promote weight gain in the form of lean muscle mass. 
                    Muscle is denser than fat, so gaining muscle can contribute to a healthier and more proportionate 
                    weight gain. Resistance training also helps improve overall strength and body composition.
                </li>
                <li>Balanced Macronutrients: Ensure that your diet includes an appropriate balance of macronutrients. 
                    Carbohydrates provide energy for physical activity, proteins are essential for muscle repair and 
                    growth, and healthy fats support hormone production and overall health. However, the ideal macronutrient 
                    ratio can vary based on individual needs, so it's advisable to consult with a healthcare professional or 
                    nutritionist for personalized guidance.
                </li>
                <li>Regular Meals and Snacks: Consuming frequent, balanced meals and snacks throughout the day can help increase 
                    overall calorie intake. Aim to include a variety of food groups in each meal to ensure you're getting a wide 
                    range of nutrients.
                </li>
                <li>Gradual Progression: It's important to approach weight gain in a gradual and sustainable manner. Rapid weight 
                    gain can lead to an unhealthy increase in body fat and may have negative effects on your health. Aim for a gradual 
                    weight gain of 0.5 to 1 pound per week.
                </li>
            </ol>
            <p>Remember, weight gain should always be approached in a healthy and balanced manner. If you have concerns about your weight 
                or are struggling with weight gain, it's recommended to consult with a healthcare professional or registered dietitian who 
                can provide personalized guidance based on your individual needs and circumstances.
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