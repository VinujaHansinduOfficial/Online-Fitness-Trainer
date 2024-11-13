<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"> -->
</head>
<body>
  <nav>
    		<div class="navlink" id="navLinks">
    			<ul>
    				<li class="active"><a href="FTHome.php">HOME</a></li>
    				<li><a href="course_home.php">COURSE</a></li>
            <li><a href="FTShop.php">SHOP</a></li>
    				<li><a href="about us page/about us.php">ABOUT US</a></li>
					  <li style="float: right;"><a href="profile_page.php" class="profilelink" id="profilelink" style="height: 35px;width: 35px;"><img src="picon.png" alt="profile" class="profile"></a></li>
    			</ul>
   			</div>
		</nav>
    <div class="background"></div>
    
    <!--NAVBAR CREATION-->
    
       <!--membership-->

       <div class="mcontainer1">

<h1 class="mb">Silver</h1>
<p class="p1"> Silver Membership:<br><br>Access to basic gym facilities such as cardio machines, weightlifting equipment, and stretching areas.<br>Group fitness classes like aerobics, yoga, or Zumba.<br>Locker room facilities and showers.<br>Standard customer support. </p>

</div>
<div class="mcontainer2">
 <h1 class="mb">Gold</h1>
 <p class="p1">Gold Membership:<br><br>All the features of the Silver Membership, plus additional perks.<br>
    Access to advanced gym equipment and training tools.<br>
    Additional specialty classes such as spinning, kickboxing, or Pilates.<br>
    Personalized workout plans or fitness assessments.<br>
    Priority scheduling for classes or training sessions.<br>
    Enhanced customer support.
 </p>
</div>

<div class="mcontainer3">
 <h1 class="mb">Diamond</h1>
 <p class="p1">Diamond Membership:<br><br>
    All the features of the Gold Membership, along with premium benefits.<br>
    Exclusive access to specialized areas or equipment.<br>
    Personal training sessions with certified trainers.<br>
    Access to spa or wellness facilities such as saunas, steam rooms, or massages.<br>
    Nutritional guidance or diet planning.<br>
    Special events or workshops.<br>
    VIP customer support.
</p>
</div>

    <div class="choose">
      <h2 >Choose your membership package:</h2>
      <form action="usermembership.php" method="post">

        <input type="radio" name="membership" value="silver">Silver Membership<br>
        <input type="radio" name="membership" value="gold">Gold Membership<br>
        <input type="radio" name="membership" value="diamond">Diamond Membership<br><br>
        <input type="submit"class="chb" value="Choose Membership">
      </form>
    </div>      

     
        <div class="mpha">
          <h1 class="mph">membership plan</h1>
         </div>

    
        
  
       

    </header>
  
        
 

</body>
</html>