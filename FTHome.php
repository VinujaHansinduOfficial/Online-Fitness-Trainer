<!DOCTYPE html>
<html>
	<head>
		<!--Linking css files-->
		<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="style1.css?v=<?php echo time(); ?>">
		<title>
			FitTutor
		</title>

		<!--Main navigation bar creation-->
		<nav>
    		<div class="navlink" id="navLinks">
    	    	<ul>
    		    	<li class="active"><a href="">HOME</a></li>
    	    		<li><a href="course_home.php">COURSE</a></li>
    	    		<li><a href="FTShop.php">SHOP</a></li>
    	    		<li><a href="about us page/about us.php">ABOUT US</a></li>
    	    		<li style="float: right;"><a href="profile_page.php" class="profilelink" id="profilelink" style="height: 35px;width: 35px;"><img src="noprofil.jpg" alt="profile" class="profile"></a></li>
        		</ul>
     		</div>
		</nav
	</head>

	<body>
		<center>
		<h1>Welcome to FitTutor</h1>
		<p2 style="font-size:26px; color: white;">
		We offer all types of exercises such as srength training, cardio training, body building, fat burning, and etc.<br>
		Join us to get a quality training from world's best coaches.
		</p2>
		</center>
		<br>

		<!--Creation of tiles-->
		<div class="row">
			<div class="col">
				<div class="card card1">
					<p>Join us and embrace your inner strength</p><br><br><br><br><br><br><br>
					<a href="login.php">
					<button class="button"><span>Get Started</span></button>
					</a>
				</div>
				<div class="card card2">
					<p>Shop with us to get the best items for the lowest price</p><br><br><br><br><br><br>
					<a href="FTShop.php">
					<button class="button"><span>Shop Now</span></button>
					</a>
				</div>
				<div class="card card3">
					<p>Learn our history and other details</p><br><br><br><br><br><br><br>
					<a href="FTShop.php">
					<button class="button"><span>About Us</span></button>
					</a>
				</div>
			</div><!--Closing col class-->
		</div><!--Closing row class-->
	</body>
</html>