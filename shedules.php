<?php
session_start();
?>
<!--Link config file-->
<?php
include("config.php");
?>
<!DOCTYPE html>
<head>
    <title>Course</title>
    <!--Link CSS-->
    <link rel="stylesheet" href="css/Shedule.css?v=<?php echo time(); ?>">
    <!--Link CSS library for display ratings star-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!--create navigation bar-->
    <nav>
        <div class="navlink">
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
    <center>
        <!--Display shedules card according to member choise from course home-->
        <script>
            const value = <?php echo $_SESSION["contentID"];?>;
            
            if ( value == 1 ){
                //display schedule card one
                document.write(`
                <div class="responsive">
                    <div class="card">
                        <a target="_blank" href="image/musclegain.jpg">
                            <img src="image/musclegain.jpg" alt="Muscle gain" width="600" height="400">
                        </a>
                        <div class="desc">
                            <?php
                            $sql = "select*from courses where CID = 1;";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<h2>".$row["CName"]."</h2>".
                                    "<span>".$row["CDescription"]."</span>";
                                }
                            }
                            ?>
                            <br><br><br><br>
                            <span><b>4.0</b></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span><b>(33)</b></span><br><br>
                        </div>
                        <a href="contenet1.php">
                        <button class="button"><span>View</span></button>
                        </a>
                    </div>
                </div>`);
            }
            if ( value == 1 || value == 2 ){
                //display schedule card two
                document.write(`
                <div class="responsive">
                    <div class="card">
                        <a target="_blank" href="image/weightgain.jpg">
                            <img src="image/weightgain.jpg" alt="Forest" width="600" height="400">
                        </a>
                        <div class="desc">
                            <?php
                            $sql = "select*from courses where CID = 3;";
                            $result = $conn->query($sql);

                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "<h2>".$row["CName"]."</h2>".
                                        "<span>".$row["CDescription"]."</span>";
                                    }
                                }
                            ?>
                            <br><br>
                            <span><b>3.0</b></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span><b>(13)</b></span><br><br>
                        </div>
                        <a href="contenet3.php">
                            <button class="button"><span>View</span></button>
                        </a>
                    </div>
                </div>`);
            }
            if ( value == 1 || value == 2 || value == 3 || value == 4){
                //display schedule card three
                document.write(`
                <div class="responsive">
                    <div class="card">
                        <a target="_blank" href="image/fatloss.jpg">
                            <img src="image/fatloss.jpg" alt="Northern Lights" width="600" height="400">
                        </a>
                        <div class="desc">
                            <?php
                            $sql = "select*from courses where CID = 2;";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<h2>".$row["CName"]."</h2>".
                                    "<span>".$row["CDescription"]."</span>";
                                }
                            }
                            ?>
                            <br><br>
                            <span><b>5.0</b></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span><b>(41)</b></span><br><br>
                        </div>
                        <a href="contenet2.php">
                            <button class="button"><span>View</span></button>
                        </a>
                    </div>
                </div>`);
            }
            if ( value == 2 || value == 3 || value == 4){
                //display schedule card four
                document.write(`
                <div class="responsive">
                    <div class="card">
                        <a target="_blank" href="image/mainteince.jpg">
                            <img src="image/mainteince.jpg" alt="Mountains" width="600" height="400">
                        </a>
                        <div class="desc">
                            <?php
                            $sql = "select*from courses where CID = 5;";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<h2>".$row["CName"]."</h2>".
                                    "<span>".$row["CDescription"]."</span>";
                                }
                            }
                            ?>
                            <br><br><br><br><br><br>
                            <span><b>2.0</b></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span><b>(7)</b></span><br><br>
                        </div>
                        <a href="contenet5.php">
                            <button class="button"><span>View</span></button>
                        </a>
                    </div>
                </div>`);
            }
            if ( value == 1 || value == 2 || value == 3 || value == 4 ){
                //display schedule card five
                document.write(`
                <div class="responsive">
                    <div class="card">
                        <a target="_blank" href="image/weightloss.jpg">
                            <img src="image/weightloss.jpg" alt="Mountains" width="600" height="400">
                        </a>
                        <div class="desc">
                            <?php
                            $sql = "select*from courses where CID = 4;";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<h2>".$row["CName"]."</h2>".
                                    "<span>".$row["CDescription"]."</span>";
                                }
                            }
                            ?>
                            <br><br>
                            <span><b>4.0</b></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span><b>(20)</b></span><br><br>
                        </div>
                        <a href="contenet4.php">
                            <button class="button"><span>View</span></button>
                        </a>
                    </div>
                </div>`);
            }
        </script>
        <?php mysqli_close($conn)?>
    </center><br><br><br><br>
</body>