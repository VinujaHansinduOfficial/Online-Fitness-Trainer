<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
   ` <nav>
    		<div class="navlink" id="navLinks">
    	    	<ul>
    		    	<li class="FTHome.php"><a href="">HOME</a></li>
    	    		<li><a href="course_home.php">COURSE</a></li>
    	    		<li><a href="FTShop.php">SHOP</a></li>
    	    		<li><a href="about us page/about us.php">ABOUT US</a></li>
    	    		<li style="float: right;"><a href="profile_page.php" class="profilelink" id="profilelink" style="height: 35px;width: 35px;"><img src="noprofil.jpg" alt="profile" class="profile"></a></li>
        		</ul>
     		</div>
		</nav

</head>
<body>
    <div class="background"></div>
    

       <!--Login and sing in-->
        
       
       <div class="container">
        <div class="item">
            <h2 class="logo">Fittutor</h2>
        </div>
            <div class="text">
                <h1>Welcome!  <br>To our fittness training</h1><br><br>
               <p> improved physical health, lower chance of chronic diseases, more energy, better control of weight, increased strength and flexibility, better mental health, more self-assurance, increased social contact, longer life expectancy, and higher </p>
               <div class="social_media"><br>
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-youtube"></a>
                <a href="#" class="fa fa-whatsapp"></a>
                <a href="#" class="fa fa-instagram"></a>
               </div>
           </div>
                <div class="login">
                    
                        <form action="loginuser.php" method="post">
                            <h2>Log In </h2>
                            <div class="inputbox1">
                                <span class="icon"></span>
                                <input type="email" name="uid" required >
                                <lable for="">Email</lable>
                            </div>
                            <div class="inputbox1">
                                <span class="icon"></span>
                                <input type="Password" name="pwd" required>
                                <lable for="">Password</lable>
                            </div class="rep">
                                <lable for=""><br><input type="checkbox">Remember my password</lable>
                                <a class="conect"href="3">Forget Password</a>
                               
                                <div class="but">

                                    <button class="bttn" name="submit" type="submit">Log In</button>


                                </div>

                                <p >Creat A New Account?<a class="conect" href="singin.php"class="register">Sign Up</a></p>

                                <div class="membership">
                                    <a href="membership.php">
                                        <input class="mbttn" type="button" value="Change Membership Plan">
                                    </a>
                                    
                             
                                </div>

                            </div>
                            
                            
                            
                        </form>
                    


                </div>
           





       </div>
         
       

    </header>
  
        




</body>
</html>