<!DOCTYPE html>
<html>
	<head>
		<!--Linking css files-->
		<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="style3.css?v=<?php echo time(); ?>">
		<title>
			Item
		</title>
	<!--Creation of main navigation bar-->
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
		<div class="container">
	
		<!--Creation of image selection class-->
			<div class="right-box">
				<div class="main-image-box">
					<img src="Item Images/Whey.jpg" id="mainImage" class="main-image">
				</div>
				<div class="small-images">
					<button class="b1" onclick="changeImage(0)" style="background-color: none;"><div class="image-box"><img src="Item Images/Sup1.jpg" class="image"></div></button>
					<button class="b1" onclick="changeImage(1)" style="background-color: none;"><div class="image-box"><img src="Item Images/Sup2.png" class="image"></div></button>
                	<button class="b1" onclick="changeImage(2)" style="background-color: none;"><div class="image-box"><img src="Item Images/Sup3.png" class="image"></div></button>
                	<button class="b1" onclick="changeImage(3)" style="background-color: none;"><div class="image-box"><img src="Item Images/Sup4.jpg" class="image"></div></button>
				</div>
	    	</div>

		<!--Defining image selection function-->
			<script>
        		function changeImage(trigger){
            		switch(trigger){
                		case 0 :
                    		document.getElementById("mainImage").src = "Item Images/Sup1.jpg";
                    		break;
                		case 1 :
               			    document.getElementById("mainImage").src = "Item Images/Sup2.png";
              			    break;
                		case 2 :
                    		document.getElementById("mainImage").src = "Item Images/Sup3.png";
                    		break;
                		case 3 :
                    		document.getElementById("mainImage").src = "Item Images/Sup4.jpg";
                    		break;
						}
					}
			</script>

		<!--Creation of item selection class-->
			<div class="details-box">
	    		<h1>Platinum Hydro Turbo Chocolate Whey Protein</h1>
				<h2>Price: Rs.15,000 - Rs.25,000</h2>
				<h4>Item ID: FT0053</h4>
				<hr>
				<div>
					<form class="" action="submititemdetails.php" method="post">
      					<label for="quant">Item quantity : </label>
  						<input type="text" id="quant" name="quantity">
  						<label for="variant">Select variant</label>
  						<select id="variant" name="variant">
        				<option value="30 servings" id="30">30 servings</option>
            			<option value="50 servings" id="50">50 servings</option></select>
						<br>

		<!--Defining the item price calculation function using javascript-->
						<script>
							function caltotal(){
								var asignQID = document.getElementById("quant").value;
								var obje = document.getElementById("variant");
								var variant = obje.options[obje.selectedIndex].text;

								quantity = +asignQID;

								if ( variant == '30 servings'){
									document.getElementById("demo").innerHTML = 15000 * quantity;
								}
								else{
									document.getElementById("demo").innerHTML = 25000 * quantity;
								}
							}
						</script>

    					<button type="button"  onclick="caltotal()">Calculate total</button><br>
						<h3 style="color:crimson; font-size: 18px; font-weight: bold; float: left;">Order total : LKR <span id="demo"></span></h3>
						<input type="submit" value="Add to cart">
					</form>
				</div>
			</div> <!--Closing details-box class-->
		</div> <!--Closing container class-->
	
		<hr class="Line1">

		<!--Creation of internal page navigation bar-->
		<nav class="pnav">
        	<div class="page-nav">
            	<ul>
            	    <li><a href="#Des">Product Description</a></li>
                	<li><a href="#Details">Product Details</a></li>
                	<li><a href="#Cus">Customer Reviews</a></li>
            	</ul>
    	    </div>
    	</nav>

		<!--Item description-->
		<div id="Des">
			<h2 style="margin-left: 15px; font-weight:bold; color: crimson;">Product Description</h2>
							
			<p>	Platinum HYDROWHEY is the most advanced whey protein we've ever developed
			containing 100% Hydrolyzed Whey Protein Isolate. Hydrolyzed Whey Protein
			Isolate has much of the carbohydrates, fat and lactose, isolated out using
			sophisticated filtering technologies, and hydrolyzing breaks larger proteins
			down into smaller pieces, so ultra-pure whey isolate is able to get into your
			system rapidly for muscle recovery support. Finally, we dialed up this ultra-pure
			and rapidly	digesting formula with added micronized Branched Chain Amino Acids (BCAAs).<p>

			<h3 style="margin-left: 15px";>Important information</h3>

			<h4 style="margin-left: 30px";>Safety Information</h4>
			<p>Do not use as sole source of nutrition. Keep out of reach of children.
			ALLERGEN INFORMATION: Contains Milk And Soy (Lecithin) Ingredients.
			This product is labelled to United States standards and may differ
			from similar products sold elsewhere in its ingredients, labeling and allergen warnings

			<h4 style="margin-left: 30px";>Indications</h4>
			<p>Used to supplement ones diet, exercise routine, sports, weightlifting,
			cycling, running, strength training, conditioning, football, soccer, rugby,
			basketball, tennis, general well being! To increase ones strength and endurance
			in their workouts, exercise program or during any sport related activities</p>

			<h4 style="margin-left: 30px";>Ingredients</h4>
			<p>Hydrolyzed Whey Protein Isolates, Micronized Branched Chain Amino Acids
			(L-Leucine, L-Isoleucine, L-Valine), Cocoa (Processed with Alkali), Natural
			and Artificial Flavors, Lecithin, Contains 1.5% or less of: Creamer
			(Sunflower Oil, Maltodextrin, Modified Food Starch, Dipotassium Phosphate,
			Tricalcium Phosphate, Tocopherols), Salt, Cellulose Gum, Potassium Chloride,
			Sucralose, Vanillin, Acesulfame Potassium, Enzyme Blend (Aminogen , Maltodextrin,
			Amylase, Protease, Cellulase, Beta-D-Galactosidase, Lipase).</p>

			<h4 style="margin-left: 30px";>Directions</h4>
			<p>Platinum Hydrowhey is Instantized, so it always mixes up easily and completely.
			Simply add 1 rounded scoop to a blender, shaker cup, or glass filled with 10-12
			ounces of cold water, milk, or your favorite beverage and blend, shake, or stir
			for 20-30 seconds or until powder is dissolved.TIP: Adjust the intensity of your
			shake by varying the amount of liquid you use to prepare it. For a slightly thicker
			consistency with bolder flavor, mix each scoop with 6-8 ounces of water.</p>

			<h4 style="margin-left: 30px";>Legal Disclaimer</h4>
			<p>Statements regarding dietary supplements have not been evaluated by the FDA
			and are not intended to diagnose, treat, cure, or prevent any disease or health condition.</p>
		</div>

	<!--Item details-->
		<div id="Details">
			<h2 style="margin-left: 15px; font-weight:bold; color: crimson;">Product Details</h2>
			<ol style="list-style-type:square; margin-left: 30px">
				<li>Hydrolyzed, Quick Digesting</li>
				<li>30 Grams of Protein Per Serving</li>
				<li>8.8 Grams of Naturally Occurring & Added BCAAs per Serving</li>
				<li>Made with 100% Hydrolyzed Whey Protein Isolate</li>
			</ol>
		</div>

	<!--Customer reviews-->
		<div id="Cus">
			<h2 style="margin-left: 15px; font-weight:bold; color: crimson;">Customer Reviews</h2>
			<div class="picon"><img src="Item Images/hashirama.jpg"></div>
				<h4 style="margin-left: 30px">Hashirama Senju</h4>
				<p style="margin-left: 30px"> Ever since I started using Hydro Whey about 10 years ago, I haven't
											looked back. This is the only protein that I can use that doesn't have
											any after affects. It's the best tasting even with water as the base!
											5 starts and I would give it 10 stars if I was allowed to. Greatest product!</p>
			<br>
			<div class="picon"><img src="Item Images/madara.jpg"></div>
				<h4 style="margin-left: 30px">Madara Uchiha</h4>
				<p style="margin-left: 30px" > I find this a good protein supplement to my diet,
											   reducing my need to eat meat. Good flavors and dissolves well.</p>
		</div>
	</body>
</html>
