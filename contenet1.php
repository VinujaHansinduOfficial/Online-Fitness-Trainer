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
where P.CID = C.CID and C.CID = D.TID and T.TID = D.CID and C.CID = 1;";
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
                    document.getElementById("mainImage").src = "image/musclegain.jpg";
                    break;
                case 1 :
                    document.getElementById("mainImage").src = "image/gainmuscle2.jpeg";
                    break;
                case 2 :
                    document.getElementById("mainImage").src = "image/gainmuscle3.png";
                    break;
                case 3 :
                    document.getElementById("mainImage").src = "image/gainmuscle4.jpeg";
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
			<img src="image/musclegain.jpg" id="mainImage" class="main-image">
			</div>
            <!--Display small images-->
			<div class="small-images">
				<button class="b1" onclick="changeImage(0)"><div class="image-box"><img src="image/musclegain.jpg" class="image"></div></button>
				<button class="b1" onclick="changeImage(1)"><div class="image-box"><img src="image/gainmuscle2.jpeg" class="image"></div></button>
                <button class="b1" onclick="changeImage(2)"><div class="image-box"><img src="image/gainmuscle3.png" class="image"></div></button>
                <button class="b1" onclick="changeImage(3)"><div class="image-box"><img src="image/gainmuscle4.jpeg" class="image"></div></button>
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
                <img src="image/Creatine.png" alt="Avatar" class="shopimage" style="width:100%">
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
        <p>When you engage in resistance training exercises such as weightlifting, 
            your muscles undergo stress and micro-tears in the muscle fibers. 
            In response to this stimulus, the body initiates a repair and adaptation process. 
            Over time, with consistent training, the muscles repair and rebuild themselves to become larger and stronger.
        </p>
        <p>The process of muscle gain involves two primary mechanisms:</p>
        <ol>
            <li>Muscle Protein Synthesis: When you perform resistance exercises, 
                it triggers an increase in muscle protein synthesis. 
                This process involves the creation of new proteins, 
                which are the building blocks of muscle tissue. 
                Higher rates of protein synthesis contribute to muscle growth and repair.
            </li>
            <li>
                Satellite Cell Activation: Satellite cells are specialized cells that play a crucial role in muscle regeneration and growth. 
                During intense exercise, these cells become activated and fuse with existing muscle fibers, 
                leading to an increase in muscle size.
            </li>
        </ol>
        <p>
            To support muscle gain, proper nutrition is essential. 
            Consuming an adequate amount of protein is crucial as it provides the necessary amino acids 
            for muscle repair and growth. Additionally, a well-balanced diet that includes carbohydrates and healthy 
            fats provides energy for intense workouts and supports overall muscle development.<br><br>
            Adequate rest and recovery are equally important for muscle gain. 
            Muscles need time to repair and adapt to the stress placed on them during exercise. 
            Getting enough sleep, taking rest days, and allowing sufficient recovery time between workouts are crucial 
            to maximize muscle growth.<br><br>
            It's important to note that muscle gain is a gradual process that requires consistency, 
            patience, and progressive overload. Progressive overload involves gradually increasing the demands placed 
            on your muscles by increasing the weight, reps, or intensity of your workouts over time.<br><br>
            It's also worth mentioning that muscle gain can vary from person to person due to factors such as genetics, 
            hormone levels, and training methods. Some individuals may naturally have an easier time gaining muscle, 
            while others may need to put in more effort.<br><br>
            Lastly, it's always recommended to consult with a qualified fitness professional or healthcare provider 
            before starting any exercise program, especially if you have any underlying health conditions or concerns. 
            They can provide personalized guidance and help you create an effective muscle gain plan tailored to your 
            specific needs and goals.<br><br>
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
                <input type="submit" value="Post">
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