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
where P.CID = C.CID and C.CID = D.TID and T.TID = D.CID and C.CID = 4;";
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
                    document.getElementById("mainImage").src = "image/weightloss.jpg";
                    break;
                case 1 :
                    document.getElementById("mainImage").src = "image/weightloss2.jpg";
                    break;
                case 2 :
                    document.getElementById("mainImage").src = "image/weightloss3.jpg";
                    break;
                case 3 :
                    document.getElementById("mainImage").src = "image/weightloss4.jpg";
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
			<img src="image/weightloss.jpg" id="mainImage" class="main-image">
			</div>
            <!--Display small images-->
			<div class="small-images">
				<button class="b1" onclick="changeImage(0)"><div class="image-box"><img src="image/weightloss.jpg" class="image"></div></button>
				<button class="b1" onclick="changeImage(1)"><div class="image-box"><img src="image/weightloss2.jpg" class="image"></div></button>
                <button class="b1" onclick="changeImage(2)"><div class="image-box"><img src="image/weightloss3.jpg" class="image"></div></button>
                <button class="b1" onclick="changeImage(3)"><div class="image-box"><img src="image/weightloss4.jpg" class="image"></div></button>
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
        <p>Here are some key aspects to consider when aiming for weight loss:</p>
        <ol>
            <li>Caloric Deficit: Weight loss occurs when you consistently consume 
                fewer calories than your body needs for daily activities and metabolism. 
                This can be achieved by reducing calorie intake through portion control, 
                choosing lower-calorie foods, and minimizing high-calorie and processed foods. 
                It can also be complemented by increasing calorie expenditure through physical activity.
            </li>
            <li>Balanced Diet: While a calorie deficit is important, it's crucial to focus on a balanced 
                and nutritious diet. Include a variety of fruits, vegetables, whole grains, lean proteins, 
                and healthy fats. These foods provide essential nutrients, vitamins, and minerals to support 
                overall health during the weight loss process.
            </li>
            <li>Portion Control: Be mindful of portion sizes to manage calorie intake effectively. 
                Use measuring tools, such as cups or a food scale, to ensure you're consuming appropriate portion sizes. 
                Pay attention to hunger and fullness cues to avoid overeating.
            </li>
            <li>Regular Physical Activity: Incorporate regular physical activity into your routine to increase calorie 
                expenditure and support weight loss. Aim for a combination of cardiovascular exercises (e.g., brisk walking, jogging, cycling) 
                and strength training exercises (e.g., weightlifting, bodyweight exercises) to burn calories, preserve muscle mass, 
                and improve overall fitness.
            </li>
            <li>Gradual and Sustainable Approach: Weight loss should be approached gradually and sustainably. 
                Aim for a weight loss rate of 1-2 pounds per week, as rapid weight loss can be detrimental to health 
                and result in muscle loss. Focus on long-term lifestyle changes rather than quick-fix solutions.
            </li>
            <li>LBehavior and Lifestyle Modifications: Adopt healthy behaviors and lifestyle modifications that support weight loss. 
                This includes adequate sleep, stress management techniques, and minimizing sedentary behavior. Healthy habits 
                contribute to overall well-being and can enhance the success of your weight loss efforts.
            </li>
            <li>Accountability and Support: Seek accountability and support from friends, family, or a healthcare professional. 
                Consider joining weight loss support groups, working with a registered dietitian, or using mobile apps or online 
                platforms to track your progress, receive guidance, and stay motivated.
            </li>
        </ol>
        <p>It's important to note that weight loss should always be pursued in a safe and healthy manner. 
            If you have any underlying health conditions or concerns, it's advisable to consult with a healthcare 
            professional or registered dietitian who can provide personalized guidance based on your individual needs and circumstances.
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
        <p style = \"color: white;\">No Reviews</p>
        </div>
        <hr>";
    }

    mysqli_close($conn)
    ?>
</body>