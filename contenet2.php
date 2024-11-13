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
where P.CID = C.CID and C.CID = D.TID and T.TID = D.CID and C.CID = 2;";
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
                    document.getElementById("mainImage").src = "image/fatloss.jpg";
                    break;
                case 1 :
                    document.getElementById("mainImage").src = "image/fatloss2.jpg";
                    break;
                case 2 :
                    document.getElementById("mainImage").src = "image/fatloss3.jpg";
                    break;
                case 3 :
                    document.getElementById("mainImage").src = "image/fatloss4.jpg";
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
			<img src="image/fatloss.jpg" id="mainImage" class="main-image">
			</div>
            <!--Display small images-->
			<div class="small-images">
				<button class="b1" onclick="changeImage(0)"><div class="image-box"><img src="image/fatloss.jpg" class="image"></div></button>
				<button class="b1" onclick="changeImage(1)"><div class="image-box"><img src="image/fatloss2.jpg" class="image"></div></button>
                <button class="b1" onclick="changeImage(2)"><div class="image-box"><img src="image/fatloss3.jpg" class="image"></div></button>
                <button class="b1" onclick="changeImage(3)"><div class="image-box"><img src="image/fatloss4.jpg" class="image"></div></button>
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
                <img src="image/Fatburner.png" alt="Avatar" class="shopimage" style="width:100%">
                <div class="shopmiddle">
                    <!--Hyperlink to shop where above item's content displayed-->
                    <a href="FTItemDescription.php"><button>View product</button></a>
                </div>
            </div>
            <div class="shopcontainer">
                <img src="image/Fatburner.jpg" alt="Avatar" class="shopimage" style="width:100%">
                <div class="shopmiddle">
                    <a href="#"><button>View product</button></a>
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
        <p>To facilitate fat loss, several key principles should be considered:</p>
        <ol>
            <li>Caloric Deficit: Fat loss occurs when you consume fewer calories than your body burns. 
                This is achieved by creating a caloric deficit through a combination of reduced calorie 
                intake and increased calorie expenditure. A moderate caloric deficit of 500-1000 calories 
                per day is often recommended to promote a gradual and sustainable fat loss of 1-2 pounds per week.
            </li>
            <li>Balanced Diet: A balanced and nutritious diet is crucial for successful fat loss. Focus on whole, 
                minimally processed foods that are rich in nutrients and low in added sugars and unhealthy fats. 
                Include a variety of fruits, vegetables, lean proteins, whole grains, and healthy fats in your meals. 
                Portion control is important to manage calorie intake effectively.
            </li>
            <li>Macronutrient Composition: While a calorie deficit is the primary driver of fat loss, the macronutrient 
                composition of your diet can also play a role. Consuming adequate protein helps preserve lean muscle mass, 
                which is important for maintaining a healthy metabolic rate and achieving a toned appearance. 
                Carbohydrates and fats should be adjusted based on individual needs and preferences.
            </li>
            <li>Regular Physical Activity: Exercise plays a crucial role in fat loss by increasing calorie expenditure, 
                improving metabolic rate, and preserving muscle mass. Incorporate a combination of cardiovascular exercises 
                (such as jogging, cycling, or swimming) and resistance training (weightlifting, bodyweight exercises) 
                to maximize fat loss and promote overall fitness.
            </li>
            <li>High-Intensity Interval Training (HIIT): HIIT involves short bursts of intense exercise followed by periods 
                of rest or lower intensity. It has been shown to be effective for fat loss due to its ability to increase 
                calorie burn and improve metabolic rate. HIIT workouts can be performed with various exercises, such as sprints, 
                cycling, or bodyweight movements.
            </li>
            <li>Lifestyle Modifications: Beyond diet and exercise, other lifestyle factors can influence fat loss. Prioritize 
                adequate sleep, as insufficient sleep can negatively impact metabolism and hormone regulation. Manage stress levels, 
                as chronic stress can interfere with fat loss efforts. Additionally, consider reducing alcohol consumption, 
                as it is high in calories and can impair fat metabolism.
            </li>
            <li>Consistency and Patience: Fat loss is a gradual process that requires consistency and patience. Sustainable fat 
                loss occurs over time, and it's important to set realistic goals and make long-term lifestyle changes. 
                Avoid crash diets or extreme measures that can be harmful to your health and lead to weight regain.
            </li>
        </ol>
        <p>It's important to note that fat loss can vary among individuals due to factors such as genetics, hormonal influences, 
            and individual metabolism. It's recommended to consult with a healthcare professional or registered dietitian who can 
            provide personalized guidance based on your specific needs and circumstances.
        </p>
        <p>Furthermore, maintaining a healthy body weight and composition is a long-term commitment. Once you achieve your desired 
            fat loss, it's important to adopt healthy habits and practices to sustain your progress and promote overall well-being.
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