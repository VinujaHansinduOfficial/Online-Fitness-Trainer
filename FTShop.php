<!DOCTYPE html>
<html>
	<head>
		<!--Linking css files-->
		<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="style2.css?v=<?php echo time(); ?>">
		<title>
			FitTutor
		</title>

		<!--Main navigation bar creation-->
		<nav>
    		<div class="navlink" id="navLinks">
        		<ul>
        			<li><a href="FTHome.php">HOME</a></li>
        			<li><a href="course_home.php">COURSE</a></li>
					<li class="active"><a href="">SHOP</a></li>
        			<li><a href="about us page/about us.php">ABOUT US</a></li>
        			<li style="float: right;"><a href="profile_page.php" class="profilelink" id="profilelink" style="height: 35px;width: 35px;"><img src="noprofil.jpg" alt="profile" class="profile"></a></li>
        		</ul>
     		</div>
		</nav>
	</head>
	
	<body>
		<div class="image-container">
			<div class="bg-image">
			</div>
				<div class="bg-text">	
					"Power up your fitness journey from the comfort of your home!"
				</div>
		</div><!--Closing image-container class-->
		<br>

		<!--Creation of internal dropdown menu-->
		<div class="dropdown" style="float:left">
			<button class="drop-button">Shop by category</button>
				<div class="drop-content">
					<a href="#">Weight gain</a>
					<a href="#">Protein supplements</a>
					<a href="#">Pre-workout</a>
					<a href="#">Creatine</a>
					<a href="#">Fat burning</a>
					<a href="#">Gym accessories</a>
				</div>
		</div>

		<!--Creation of search bar-->
		<div class="search-bar">
  			<input type="text" placeholder="Search...">
  			<button type="submit">Search</button>
		</div>

		<!--Creation of cart button-->
		<button class="cart"><img src="Item Images/cart.jpg" alt="image"></button>
		<br>

		<!--Creation of item tiles-->
		<div class="row">
			<div class="col">
				<div class="card card1">
					<a href="FTItemDescription.php"><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<button class="button"><span>Platinum Hydro Whey Protein<br>Rs.25,000 - Rs.35000</span></button>
					</a>
				</div>
				<div class="card card2">
					<a href="FTItemDescription.php"><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<button class="button"><span>Primal Mass Gain<br>Rs.20,000 - Rs.27,000</span></button>
					</a>
				</div>
				<div class="card card3">	
					<a href="FTItemDescription.php"><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<button class="button"><span>Fat Burner Supplement<br>Rs.15,000</span></button>
					</a>
				</div>
				<div class="card card4">
					<a href="FTItemDescription.php"><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<button class="button"><span>Nutrend Pre-workout<br>Rs.12,000 - Rs.14,000</span></button>
					</a>
				</div>
				<div class="card card5">
					<a href="FTItemDescription.php"><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<button class="button"><span>Creatine Powder Super<br>Rs.8,000 - Rs.12,000</span></button>
					</a>
				</div>
				<div class="card card6">
					<a href="FTItemDescription.php"><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<button class="button"><span>Gym Gloves<br>Rs.2500</span></button>
					</a>
				</div>
			</div> <!--Closing of col class-->
		</div> <!--Closing of row class-->
	</body>
</html>