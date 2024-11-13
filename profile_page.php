<?php

    if (isset($_COOKIE["newImageName"])) {
      $image_nm= $_COOKIE["newImageName"];
    }
    else {
      require 'config1.php';


      $_SESSION["id"] = 1;
      $sessionid = $_SESSION["id"];
      $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_uploads WHERE id = $sessionid"));
      $image_nm= $user['image'];
    }
 ?>
<?php
require 'config1.php';

$member_id = $_COOKIE["member_id"];
$table = "height_" . $member_id;
$courses= array();
$course="SELECT * FROM memeber_courses as m ,courses as c WHERE m.CID = c.CID AND MID='$member_id'";
$couser_query_ex = $conn->query($course);
if ($couser_query_ex->num_rows>0) {
  while ($rows1 = $couser_query_ex->fetch_assoc()) {
    $courses[] = $rows1["CName"];
  }
}else {
  $courses[] = "";
}

$month = date("M");
$query_users = "SELECT * FROM usersinf WHERE mID='$member_id'";
$result2 = $conn->query($query_users);


$sqlCheckTable = "SHOW TABLES LIKE '$table'";
$result = $conn->query($sqlCheckTable);

if ($result->num_rows == 0) {
    // Table doesn't exist, so create it
    $sqlCreateTable = "CREATE TABLE $table(`id` int(11) NOT NULL,`height` float DEFAULT NULL,`month` varchar(8) DEFAULT NULL,`weight` float NOT NULL,`waist` float NOT NULL,`hip` float NOT NULL)";
    $conn->query($sqlCreateTable);
}

if ($result2->num_rows == 1) {
    while ($row1 = $result2->fetch_assoc()) {
        $Height = $row1["height"];
        $Weight = $row1["weight"];
        $hip = $row1["hip"];
        $waist = $row1["waist"];
    }



    if (($conn->query("SELECT * FROM $table WHERE month = '$month'")->num_rows == 0)) {
    // No records exist for the given month
    $height_iD = $conn->query("SELECT MAX(id) FROM $table")->fetch_row()[0];
    $height_iD++;
    $Query_update = "INSERT INTO $table (id, height, month, weight,waist,hip) VALUES ('$height_iD', '$Height', '$month', '$Weight','$waist','$hip')";
    $conn->query($Query_update);

} else {
    // Records exist for the given month, so update the existing row
    $Query_update = "UPDATE $table SET weight = $Weight, height = $Height, waist=$waist,hip=$hip WHERE month = '$month'";
    $conn->query($Query_update);
}

if ($conn->query("SELECT * FROM $table")->num_rows > 10) {
  $min_id = $conn->query("SELECT MIN(id) FROM $table")->fetch_row()[0];
  $conn->query("DELETE FROM $table WHERE id = '$min_id';");
}


}

$sql_height = "SELECT * FROM $table";
$result4 = $conn->query($sql_height);

$height_per_month = array();
$month = array();
$weight_per_month = array();
$waist_per_month = array();
$hip_per_month = array();
if ($result4->num_rows > 0) {
    while ($rows = $result4->fetch_assoc()) {
        $height_per_month[] = $rows["height"];
        $month[] = $rows["month"];
        $weight_per_month[] = $rows["weight"];
        $waist_per_month[] = $rows["waist"];
        $hip_per_month[] = $rows["hip"];
    }
}

$conn->close();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>profile page</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
      height: 1800px;
      width: 6px;
      width: 100%;
      color: white;

    }

    h1{
      font-family: 'Oswald', sans-serif;
      text-align: center;
      padding-bottom: 100px;
      font-size: 50px;
      margin-top: 150px;
    }
    p{
      font-family: 'Oswald', sans-serif;
      text-align: justify;
      font-size: 18px;
    }

    .para_history{
      padding: 3px 3px;
      line-height: 1.5;
      margin-bottom: 10px;
      text-align: justify;
      font-size: 14px;
      width: 400px;
    }
    .courses{
      margin-right: -270px;
      line-height: 1.5;
      margin-bottom: 10px;
      font-size: 20px;
      width: 400px;
    }

    .image{
      width: 200px;
      height: auto;
      margin-left: auto;
      margin-right: auto;
      margin-top: 150px;
      margin-bottom: -150px;
      display: block;
      border-radius: 50%;
      border: solid;
      border-width: medium;
      border-color: black;

    }

    .height_chart_div{
      border: solid;
      border-width: thin;
      border-color: white;
      margin-left: 180px;
      margin-right: 650px;
      padding-left: auto;
      margin-top: 50px;
      margin-bottom: -49px;
      height: 300px;
      display: grid;
      max-width: 450px;
    }
    .Weight_chart_div{
      border: solid;
      border-width: thin;
      border-color: white;
      margin-left: 630px;
      margin-right: 200px;
      margin-top: -300px;
      margin-bottom: 155px;
      padding-left: auto;
      max-width: 450px;
      height: 300px;
      display: grid;
      grid-gap: 10px;
    }
    .hip_chart_div{
      border: solid;
      border-width: thin;
      border-color: white;
      margin-left: 630px;
      margin-right: 200px;
      margin-top: -650px;
      margin-bottom: 155px;
      padding-left: auto;
      max-width: 450px;
      height: 300px;
      display: grid;
      grid-gap: 10px;
    }
    .waist_chart_div{
      border: solid;
      border-width: thin;
      border-color: white;
      margin-left: 180px;
      margin-right: 650px;
      padding-left: auto;
      margin-top: -157px;
      margin-bottom: 350px;
      height: 300px;
      display: grid;
      max-width: 450px;
    }
    .Personal_details{
      border: solid;
      border-width: thin;
      border-color: white;
      margin-left: 180px;
      margin-right: 650px;
      margin-bottom: -400px;
      margin-top: 200px;
      height: 400px;
      display: block;
      max-width: 450px;
      padding-left: 50px;
    }

    .Membership_Plan{
      border: solid;
      border-width: thin;
      border-color: white;
      margin-left: 630px;
      margin-right: 200px;
      margin-top: -258px;
      margin-bottom: -50px;
      height: 400px;
      display: block;
      max-width: 450px;
      padding-left: 50px;
    }

    .Personal_progress{
      border: solid;
      border-width: thin;
      border-color: white;
      margin-left: 180px;
      margin-right: 650px;
      margin-top: 49px;
      margin-bottom: -51px;
      height: 233px;
      display: block;
      max-width: 450px;
      padding-left: 50px;
    }

    .Training_History{
      border: solid;
      border-width: thin;
      border-color: white;
      margin-left: 630px;
      margin-right: 200px;
      margin-top: -233px;
      margin-bottom: -50px;
      height: 233px;
      display: block;
      max-width: 450px;
    }

    .Weight_chart{
      margin-top: -50px;
      margin-bottom: -50px;
    }
    .bttn{
      padding: 0;
      margin: 0;
      width: 100px;
      height: 50px;
      margin-left: 610px;
      margin-right: 780px;
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
    .bttn2{
      padding: 0;
      margin: 0;
      width: 100px;
      height: 50px;
      margin-left:740;
      margin-top: 10px;
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
    .editbtn{
      text-decoration: none;

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
    .navlink li a:hover:not(.active a){
        background-color: gray;
        color: whitesmoke;
        transition: 0.6s;
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

    .profile{
        height: 45px;
        width: 45px;
        vertical-align: middle;
        border-radius: 50%;
        margin-right: 50px;
        position: relative;
        padding-bottom: 3px;
    }
    .bttn:hover{
      background-color: #36454F;
      color: whitesmoke;
      transition: 0.6s;
    }
    .bttn2:hover{
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
      <li class="profile_list" style="float: right;"> <a href="profile_page.php"><img src="img/<?php echo $image_nm; ?>" alt="profile" class="profile"></a> </li>
    </ul>
    </div>
</nav>
    <center>
      <img src="img/<?php echo $image_nm; ?>" id="image" class="image"><br><br>



            <?php
            require 'config1.php';
            $mID= $_COOKIE["member_id"];
            //echo $mID;
            $query = "SELECT * FROM usersinf WHERE mID = '$mID'";
            $result = $conn->query($query);
            if ($result-> num_rows>=1) {
              while ($row = $result->fetch_assoc()) {
                $weight=$row["weight"];
                $height=$row["height"];
                $waist=$row["waist"];
                $hip=$row["hip"];
                $BMI=$weight/(($height/100)*($height/100));

                $fist_weight = "UPDATE usersinf SET first_weight = $weight WHERE (mID = '$member_id' AND (first_weight = 0 OR first_weight IS NULL));";
                mysqli_query($conn, $fist_weight);

                $first_height = "UPDATE usersinf SET first_height = $height WHERE (mID = '$member_id' AND (first_height = 0 OR first_height IS NULL));";
                mysqli_query($conn, $first_height);

                $first_waist = "UPDATE usersinf SET first_waist = $waist WHERE (mID = '$member_id' AND (first_waist = 0 OR first_waist IS NULL));";
                mysqli_query($conn, $first_waist);

                $first_hip = "UPDATE usersinf SET first_hip = $hip WHERE (mID = '$member_id' AND (first_hip = 0 OR first_hip IS NULL));";
                mysqli_query($conn, $first_hip);
                if ($BMI<=16) {
                  $Classification="Severe Thinness";
                }elseif ($BMI>16 and $BMI<=17) {
                  $Classification="Moderate Thinness";
                }elseif ($BMI>17 and $BMI<=18.5) {
                  $Classification="Mild Thinness";
                }elseif ($BMI>18.5 and $BMI<=25) {
                  $Classification="Normal";
                }elseif ($BMI>25 and $BMI<=30) {
                  $Classification="Overweight";
                }elseif ($BMI>30 and $BMI<=35) {
                  $Classification="Obese Class I";
                }elseif ($BMI>35 and $BMI<=40) {
                  $Classification="Obese Class II";
                }elseif ($BMI>40) {
                  $Classification="Obese Class III";
                }
                echo "<div class='Personal_details'><p><b>Personal details : </b></p><br><p>Name : ".$row["name_of_member"]."</p><p>Username : ".$row["username"]."<p>Age : ".$row["age"]."</p><p>Height : ".$row["height"]."</p><p>Weight : ".$row["weight"]."</p><p>Starting Date : ".$row["start_date"]."  </p></div>";
                echo "<div class='Membership_Plan'><p><b>Membership Plan : </b></p>"."<p>Enrolled Courses:"."</p><p class='courses'>".implode("<br>",$courses)."</p><p>Preferred Trainer :".$row["trainer_name"]." </p><p>Duration : ".$row["duration"]." </p><p>Goals:<br><p>Short-term Goal:".$row["short_goal"]."</p><p>Long-term Goal : ".$row["long_goal"]."</p><p>Workout Type :".$row["workout_type"]."</p></div>";
                echo "<div class='Personal_progress'><p><b>Personal progress :</b></p><p>Intensity Level : ".$row["Intensity"]."</p><p>Height change :".$row["height"]-$row["first_height"]." </p><p>Weight change : ".$row["weight"]-$row["first_weight"]." </p><p>waist size change : ".$row["waist"]-$row["first_waist"]."</p><p>hip size change : ".$row["hip"]-$row["first_hip"]."</p>"."<p>BMI : ".round($BMI, 3)."(".$Classification.")</p>"."</div>";
                echo "<div class='Training_History'><p><b>Training History :</b></p><br><p class='para_history'>".$row["taring_history"]."</p></p></div>";
                echo "<div class='height_chart_div'>
                    <p><b>Height</b></p>
                    <canvas id='height_chart' style='width:100%;max-width:600px'></canvas>
                  </div>

                  <div class='Weight_chart_div'>
                    <p><b>Weight</b></p>
                    <canvas id=Weight_chart style='width:100%;max-width:600px'></canvas>
                  </div>
                  <div class='waist_chart_div'>
                    <p><b>waist</b></p>
                    <canvas id='waist_chart' style='width:100%;max-width:600px'></canvas>
                  </div>

                  <div class='hip_chart_div'>
                    <p><b>hip</b></p>
                    <canvas id='hip_chart' style='width:100%;max-width:600px'></canvas>
                  </div> <a href='profile_page_form.php' class='editbtn'><button type='button' name='edit' class='bttn'><b>Edit details</b></button></a>";
              }
            } else {
              echo "<h1><b>please update your details.</b></h1><a href='profile_page_form.php' class='editbtn'><button type='button' name='edit' class='bttn2'><b>Edit details</b></button></a><style>footer{margin-top: 800px;}</style>";
            }

            //echo "";

             ?>
    </center>
    <script type="text/javascript">
    const xValues = <?php echo json_encode($month); ?>;
    const yValues = <?php echo json_encode($height_per_month); ?>;
    const XValues = <?php echo json_encode($month); ?>;
    const YValues = <?php echo json_encode($weight_per_month); ?>;
    const waistValues = <?php echo json_encode($waist_per_month); ?>;
    const hipValues = <?php echo json_encode($hip_per_month); ?>;

    new Chart("waist_chart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: true,
          lineTension: 0,
          backgroundColor: "#ADD8E6",
          borderColor: "#6F8FAF",
          pointBackgroundColor: "#000075",
          data: waistValues
        }]
      },
      options: {
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: <?php echo round($conn->query("SELECT MIN(waist) FROM $table")->fetch_row()[0], 1); ?>, max: <?php echo round($conn->query("SELECT MAX(waist) FROM $table")->fetch_row()[0], 1); ?>, fontColor: "white"},gridLines: {color: "white" }}],
          xAxes: [{ticks: {fontColor: "white"},gridLines: {color: "white" }}]
        }
      }
    });

    new Chart("hip_chart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: true,
          lineTension: 0,
          backgroundColor: "#ADD8E6",
          borderColor: "#6F8FAF",
          pointBackgroundColor: "#000075",
          data: hipValues
        }]
      },
      options: {
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: <?php echo round($conn->query("SELECT MIN(hip) FROM $table")->fetch_row()[0], 3); ?>, max: <?php echo round($conn->query("SELECT MAX(hip) FROM $table")->fetch_row()[0], 3); ?>, fontColor: "white"},gridLines: {color: "white" }}],
          xAxes: [{ticks: {fontColor: "white"},gridLines: {color: "white" }}]
        }
      }
    });

    new Chart("height_chart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: true,
          lineTension: 0,
          backgroundColor: "#ADD8E6",
          borderColor: "#6F8FAF",
          pointBackgroundColor: "#000075",
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: <?php echo round($conn->query("SELECT MIN(height) FROM $table")->fetch_row()[0], 0); ?>, max: <?php echo round($conn->query("SELECT MAX(height) FROM $table")->fetch_row()[0], 0); ?>, fontColor: "white"},gridLines: {color: "white" }}],
          xAxes: [{ticks: {fontColor: "white"},gridLines: {color: "white" }}]
        }
      }
    });

    new Chart("Weight_chart", {
      type: "line",
      data: {
        labels: XValues,
        datasets: [{
          fill: true,
          lineTension: 0,
          backgroundColor: "#ADD8E6",
          borderColor: "#6F8FAF",
          pointBackgroundColor: "#000075",
          data: YValues
        }]
      },
      options: {
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: <?php echo round($conn->query("SELECT MIN(weight) FROM $table")->fetch_row()[0], -1); ?>, max: <?php echo round($conn->query("SELECT MAX(weight) FROM $table")->fetch_row()[0], -1); ?>, fontColor: "white"},gridLines: {color: "white" }}],
          xAxes: [{ticks: {fontColor: "white"},gridLines: {color: "white" }}]
        }
      }
    });
    </script>
    <?php //      margin-top: -100px;margin-bottom: -100px; ?>


    <footer>
      <h3>this is the footer</h3>
    </footer>
  </body>
</html>
