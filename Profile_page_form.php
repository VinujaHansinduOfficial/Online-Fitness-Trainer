<?php
require 'config1.php';


$_SESSION["id"] = 1;
$sessionid = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_uploads WHERE id = $sessionid"));
if (isset($_COOKIE["newImageName"])) {
  $imagename= $_COOKIE["newImageName"];
} else {
  $imagename = $user['image'];
}


 ?>

 <?php
 require 'config1.php';
 if(isset($_POST["submit1"])){
   if($_FILES["image"]["error"] == 4){
     echo
     "<script> alert('Image Does Not Exist'); </script>"
     ;
   }
   else{
     $fileName = $_FILES["image"]["name"];
     $fileSize = $_FILES["image"]["size"];
     $tmpName = $_FILES["image"]["tmp_name"];

     $validImageExtension = ['jpg', 'jpeg', 'png'];
     $imageExtension = explode('.', $fileName);
     $imageExtension = strtolower(end($imageExtension));
     if ( !in_array($imageExtension, $validImageExtension) ){
       echo
       "
       <script>
         alert('Invalid Image Extension');
       </script>
       ";
     }
     else if($fileSize > 1000000){
       echo
       "
       <script>
         alert('Image Size Is Too Large');
       </script>
       ";
     }
     else{
      //require_once 'submit.php';

       $newImageName = uniqid();
       $newImageName .= '.' . $imageExtension;
       // Set the cookie before moving the file and executing the query\
       setcookie("newImageName", $newImageName, time() + (60 * 60 * 24 * 7 * 4), "/");


       $mid=$_COOKIE['member_id'];
       move_uploaded_file($tmpName, 'img/' . $newImageName);
       $query = "INSERT INTO tb_uploads VALUES('$mid', '','$newImageName')";
       mysqli_query($conn, $query);


       //echo $_COOKIE["newImageName"];
       //$rows = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY id DESC")
         //echo $mid;

     }
   }
 }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>profile page</title>
     <script>
  function clickButton() {
    // Simulate click event on the first button
    document.getElementById('files').click();
    // Simulate click event on the second button
    //await delay(2000);
    //document.getElementById('submit1').click();
  }
</script>
   </head>

   <body>
     <style media="screen">

     @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap');

     *{
       font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
       margin:0; padding:0;
       box-sizing: border-box;
       text-decoration: none;

       outline: none; border:none;
       text-transform: capitalize;
     }
     body{
       background:url('css/background1.jpg');
       background-position: center center;
       background-size: cover;
       height: 1000px;
       width: 6px;
       width: 100%;
       color: white;

     }

     p{
       font-family: 'Oswald', sans-serif;
       text-align: left;
       font-size: 20px;
     }

     .image{
       width: 200px;
       height: auto;
       margin-left: auto;
       margin-right: auto;
       display: block;
       border-radius: 50%;
       border: solid;
       border-width: medium;
       border-color: black;
       margin-top: 35px;
     }

     .files{
       margin-left: auto;
       margin-right: auto;
       display: block;
     }

     .Personal_details{
       border: solid;
       border-width: thin;
       border-color: white;
       margin-left: 180px;
       margin-right: 628px;
       margin-top: 55px;
       margin-bottom: -60px;
       height: 320px;
       display: block;
       max-width: 450px;
       padding-left: 50px;
     }
     .Membership_Plan{
       border: solid;
       border-width: thin;
       border-color: white;
       margin-left: 630px;
       margin-right: 180px;
       margin-top: -320px;
       margin-bottom: 150px;
       height: 320px;
       display: block;
       max-width: 450px;
       padding-left: 50px;
     }
     .Personal_progress{
       border: solid;
       border-width: thin;
       border-color: white;
       margin-left: 180px;
       margin-right: 628px;
       margin-top: -151px;
       margin-bottom: -81px;
       height: 320px;
       display: block;
       max-width: 450px;
       padding-left: 50px;
     }
     .Training_History{
       border: solid;
       border-width: thin;
       border-color: white;
       margin-left: 630px;
       margin-right: 180px;
       margin-top: -320px;
       margin-bottom: 150px;
       height: 320px;
       max-width: 450px;
       padding-left: auto;
       display: block;
     }
     .name{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 120px;
       margin-right: auto;
     }
     .username{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 90px;
       margin-right: auto;
     }
     .age{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 135px;
       margin-right: auto;
     }
     .height{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 115px;
       margin-right: auto;
     }
     .weight{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 112px;
       margin-right: auto;
     }
     .start_date{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 67px;
       margin-right: auto;
     }
     .waist{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 90px;
       margin-right: auto;
     }
     .hip{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 106px;
       margin-right: auto;
     }
     .Intensity{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 64px;
       margin-right: auto;
     }
     .intensity_calculate{
       text-decoration: none;
       color: white;
       font-size: 15px;
     }
     .trainer_name{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 55px;
       margin-right: auto;
     }
     .Duration{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 115px;
       margin-right: auto;
     }
     .short_goal{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 60px;
       margin-right: auto;
     }
     .long_goal{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 64px;
       margin-right: auto;
     }
     .workout_type{
       padding: 3px;
       width: 120px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-left: 80px;
       margin-right: auto;
     }
     .taring_history{
       padding: 3px;
       width: 120px;
       border: 2px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       margin-right: auto;
     }

     .bttn1{
       padding: 0;
       margin: 0;
       width: 32px;
       height: 32px;
       margin-left: 720px;
       margin-right: 720px;
       margin-top: -50px;
       margin-bottom: 5px;
       position: relative;
       border: 3px solid #4682B4;
       border-radius: 50%;
       transition-duration: 60s;
       display: block;
       background: url('css/camera.png');
       background-position: center center;
       background-size: 32px;
       background-repeat: no-repeat;
       cursor: pointer;
     }

     .submit1{
       padding: 0;
       margin: 0;
       width: 32px;
       height: 32px;
       margin-left: 595px;
       margin-right: 580px;
       margin-top: -40px;
       margin-bottom: 5px;
       position: relative;
       border: 1px solid #008000;
       border-radius: 50%;
       transition-duration: 60s;
       display: block;
       background: url('css/right.png');
       background-size: cover;
       background-size: 30px;
       cursor: pointer;
     }
     .taring_history{
       width: 400px;
       height: 200px;
       border: 1px solid black;
       padding: 20px;
     }
     .navlink ul{
         padding:8px;
         margin: 0;
         height: auto;
         list-style-type: none;
         overflow: hidden;
         background-color: black;

     }
     .navlink li{
         float: left;
         margin-left: 8px;
         margin-top: 7px;
     }
     .navlink li a{
         display: block;
         padding: 10px;
         font-size: 15px;
         font-weight: bold;
         text-decoration: none;
         border-radius: 25px;
         width: 99px;
         height: auto;
         text-align: center;
         padding-top: 12px;
         color: white;
     }
     .navlink li a:hover{
         background-color: gray;
         color: whitesmoke;
         transition: 0.6s;
     }

     .profile{
         height: 45px;
         width: 45px;
         vertical-align: middle;
         border-radius: 50%;
         margin-right: 5px;
         position: relative;
         padding-bottom: 3px;
     }
     .navlink .profile_list a{
         display: block;
         padding: 3px;
         font-size: 15px;
         font-weight: bold;
         text-decoration: none;
         border-radius: 50%;
         width: 50px;
         height: 50px;
         padding-top: 3px;
     }
     .navlink .profile_list a:hover{
         background-color: gray;
         color: whitesmoke;
         transition: 0.6s;
     }
     #submit2{
       padding: 0;
       margin: 0;
       width: 100px;
       height: 50px;
       margin-left: 630px;
       margin-right: 630px;
       margin-top: -110px;
       margin-bottom: 5px;
       position: relative;
       border: 1px solid black;
       border-radius: 30%;
       display: block;
       background-color: white;
       color: #black;
       font-size: 16px;
       cursor: pointer;
     }
     #submit2:hover{
       background-color: #36454F;
       color: whitesmoke;
       transition: 0.6s;
     }
     </style>
     <nav>
     <div class="navlink" id="navLinks">
     <ul>
       <li><a href="FTHome.php">HOME</a></li>
       <li><a href="course_home.php">COURSE</a></li>
   	   <li><a href="FTShop.php">SHOP</a></li>
       <li><a href="about us page/about us.php">ABOUT US</a></li>
     <li class="profile_list" style="float: right;"> <a href="profile_page.php"><img src="img/<?php echo $imagename; ?>" alt="profile" class="profile" id="profile"></a> </li>
     </ul>
     </div>
 </nav>
     <form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
       <?php echo "please input the profile picture after submit the details."; ?>
       <img src="img/<?php echo $imagename; ?>" id="image" class="image"><br>
       <button type="button" name="butn" class="bttn1" onclick="clickButton()"></button>   <button type = "submit" name = "submit1" class="submit1" id="submit1" onclick=""></button>
       <input type="file" name="image" accept=".jpg, .jpeg, .png" value="" class="files" id="files" style="display: none;"><br><br>

     </form>
     <center>
      <form class="" action="submit.php" method="post">
        <div class="all_table">
          <div class="Personal_details">
            <p><b>Personal details:</b></p> <br><p>Name: <input type="text" name="name" value="" class="name" placeholder="Name"></p>
  <p>Username: <input type="text" name="username" class="username" value="" placeholder="Username"></p>
  <p>Age: <input type="text" name="age" value="" class="age" placeholder="age"></p>
  <p>Height: <input type="text" name="height" value="" class="height" placeholder="height"></p>
  <p>Weight: <input type="text" name="weight" value="" class="weight" placeholder="weight"></p>
  <p>Starting Date: <input type="date" name="start_date" value="" class="start_date"></p>
  <p>waist size: <input type="text" name="waist" value="" class="waist" placeholder="waist"></p>
  <p>hip size: <input type="text" name="hip" value="" class="hip" placeholder="hip"></p>
          </div>
          <div class="Membership_Plan">
            <p><b>Membership Plan:</b><br></p> <br>


  <p>Preferred Trainer:<input type="text" name="trainer_name" value="" class="trainer_name" placeholder="trainer name"></p>
  <p>Duration: <input type="text" name="Duration" value="" class="Duration" placeholder="Duration"></p>

  <p>Goals:</p> <br>
  <p>Short-term Goal:<select name="short_goal" value="" class="short_goal" placeholder="short goal">
    <option value="">none</option>
    <option value="Improve cardiovascular endurance">Improve cardiovascular endurance</option>
    <option value="Increase strength">Increase strength</option>
    <option value="Enhance flexibility">Enhance flexibility</option>
    <option value="Weight loss or body composition change">Weight loss or body composition change</option>
    <option value="Master a specific exercise or skill">Master a specific exercise or skill</option>
    <option value="Establish a workout routine">Establish a workout routine</option>
  </select> </p>
  <p>Long-term Goal: <select name="long_goal" value="" class="long_goal" placeholder="long goal">
    <option value="">none</option>
      <option value="Complete a specific event">Complete a specific event</option>
      <option value="Achieve a significant weight loss">Achieve a significant weight loss</option>
      <option value=" body transformation">body transformation</option>
      <option value="Develop a specific skil">Develop a specific skil</option>
      <option value="Maintain overall health">Maintain overall health</option>
    </select></p>
  <p>Workout Type:
    <select name="workout_type" class="workout_type">
      <option value="">none</option>
        <option value="Cardiovascular">Cardiovascular</option>
        <option value="Strength training workouts">Strength training workouts</option>
        <option value="Flexibility and stretching workouts">Flexibility and stretching workouts</option>
        <option value="High-intensity interval training">High-intensity interval training</option>
        <option value="Functional training">Functional training</option>
    </select>
</p>
          </div>
          <div class="Personal_progress">
            <p><b>Personal progress:</b></p><br>
  <p>Intensity Level: <input type="text" name="Intensity" value="" class="Intensity" placeholder="Intensity"></p>
  <p class="intensity_calculate"> <a href="https://www.mayoclinic.org/healthy-lifestyle/fitness/in-depth/exercise-intensity/art-20046887" style="color:white;">How to calculate Intensity level</a> </p>
          </div>
          <div class="Training_History">
          <p><b>Training History:</b></p> <br> <textarea name="taring_history" class="taring_history" rows="8" cols="10" placeholder="Please give us an overview of the trainee's training history, such as past programs or trainers they have worked with."></textarea>
          </div>
        </div>
        <button type="submit" name="submit2" id="submit2">Submit</button>
      </form>


     </center>

     <script type="text/javascript">
       var image_name= "<?php echo "$newImageName"; ?>"
       document.getElementById("image").src = "img/"+ image_name;
       document.getElementById("profile").src = "img/"+ image_name;
     </script>



   </body>
   <footer> <h3>this is the footer</h3> </footer>
 </html>
