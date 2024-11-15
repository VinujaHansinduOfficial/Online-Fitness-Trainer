<html>
<head>
    <title>Our trainers</title>
    <link rel="stylesheet" href="our_trainers.css?v=<?php echo time(); ?>">
</head>
<body>
    <!--background image-->
    <div class="bg-image">
    <!--navigation bar-->
    <nav>
        <div class="navlink" id="navLinks">
            <ul>
                <li><a  href="http://localhost/Assignment/FTHome.php">HOME</a></li>
                <li><a href="http://localhost/Assignment/course_home.php">COURSE</a></li>
                <li><a href="http://localhost/Assignment/FTShop.php">SHOP</a></li>
                <li class="active"><a href="http://localhost/Assignment/about us page/about us.php">ABOUT US</a></li>
                <li style="float: right;"><a href="profile_page.php" class="profilelink" id="profilelink" style="height: 35px;width: 35px;"><img src="noprofil.jpg" alt="profile" class="profile"></a></li>
            </ul>
        </div>
    </nav>
    <!-- about us page navigation bar-->
    <nav class="pnav">
        <div class="page-nav">
            <ul>
                <li><a href="http://localhost/Assignment/about%20us%20page/about%20us.php">About FitTutor</a></li>
                <li class="active"><a href="http://localhost/Assignment/TRAINER%20DETAILS%20PAGE/OUR%20TRAINERS.php">Our Trainers</a></li>
                <li><a href="http://localhost/Assignment/faq/faq.php">FAQ</a></li>
            </ul>
        </div>
    </nav>
<!-----------trainer 1 details--------->
    <div class="container">
        <div class="trainer1">
            <div class="image"></div>
                <div class="details">
                    <h1>Felix Harder</h1>
                    <h3>Health & Fitness Coach | Best Selling Instructor</h3>
                    <button class="button" id="button" onclick="displayinfo();">See details</button>
                    <div id="change" class="hide"><p>
                        Hi,<br>

                        I'm a certified coach and author. Over the years I've worked with and coached 100,000 students from all over the world. <br>
                        
                        My expertise includes science-based personal development, health & fitness advice in the following areas:</p>
                            <ul >
                                <li>Self Improvement</li> 
                                <li>Life Coaching  </li>
                                <li>Stress Management </li>
                                <li>Muscle Growth & Fat Loss </li>
                                <li>Healthy Living & Meal Planning </li>
                                <li>Gym Workouts & Bodybuilding </li>
                            </ul>       
                    <h4 >Personal Development doesn't have to be difficult!</h4>
                    <p > What you need are the right strategies and a few simple - but crucial - tips on how to get started and stay motivated. <br>
                        That's what I teach in my courses, on my blog and in my books.
                    </p>
                    <h4>Phone: <a href="tel:0728976546">0728976546</a> | Email: <a href="mailto:FelixHarder@gmail.com">FelixHarder@gmail.com</a></h4>
                    <button class="button" id="returnbt" onclick="returnback()">hide details</button>
                </div>
                </div>
        </div>
    

    <!--trainer 2 details-->
    <div class="trainer2">
        <div class="image"></div>
            <div class="details">
                <h1>Michael Roberts</h1>
                <h3>Health & Fitness Coach | Marshal Art Instructor</h3>
                <button class="button" id="button2" onclick="displayinfo2();">See details</button>
                <div id="change2" class="hide"><p>
                Hi there! I'm Coach Michael Roberts, a dedicated male fitness trainer focused on helping you achieve your goals.<br>
                 With years of experience and a certification in Personal Training from ISSA, I specialize in functional training,<br>
                  weightlifting, and endurance conditioning. As your online fitness trainer, I'll provide personalized coaching and <br>
                  support through video calls and detailed workout plans. Together, we'll build strength, improve stamina, and enhance<br>
                   your overall athleticism. I believe in setting realistic goals and establishing sustainable habits for long-term success.<br>
                    My positive and motivating approach will push you to reach your full potential. I understand the importance of mental and<br>
                     emotional well-being, and I'll help you develop a positive mindset and self-confidence. Join my online coaching program<br>
                     today.</p>
                <h4>let's embark on a transformative fitness journey together.</h4>
                
                <h4>Phone: <a href="tel:0728976546">0728976546</a> | Email: <a href="mailto:MichaelRoberts@gmail.com">MichaelRoberts@gmail.com</a></h4>
                <button class="button" id="returnbt2" onclick="returnback2()">hide details</button>
            </div>
            </div>
    </div>

    <!--trainer 3 details-->
    <div class="trainer3">
        <div class="image"></div>
            <div class="details">
                <h1>Ryan Johnson </h1>
                <h3>Health & Fitness Coach | Best Selling Instructor</h3>
                <button class="button" id="button3" onclick="displayinfo3();">See details</button>
                <div id="change3" class="hide"><p>
                    I'm Coach Ryan Johnson, an experienced online fitness instructor with over 12 years of expertise. <br>
                    As a certified Personal Trainer and holding a degree in Exercise Physiology, I specialize in strength training,<br>
                    functional fitness, and sports performance. My goal is to create a personalized training program tailored to your goals,<br>
                    preferences, and limitations. Through virtual sessions and constant communication, I'll provide guidance, motivation,<br>
                     and accountability. I understand the challenges of training remotely and will adapt your workouts accordingly. <br>
                    Safety and proper technique are my priorities, as we gradually increase the intensity of your workouts. I also emphasize <br>
                    overall well-being, incorporating nutrition and mental wellness into our approach. With a friendly and professional <br>
                    coaching style, I'll support and inspire you to surpass your expectations. Let's embark on a transformative fitness <br>
                    journey together. Join my online coaching program and unlock your full potential.</p>
                    <h4 >Let me be the guid to your body improvement journey.</h4>
                <h4>Phone: <a href="tel:0728976546">0728976546</a> | Email: <a href="mailto:Ryan Johnson@gmail.com">RyanJohnson@gmail.com</a></h4>
                <button class="button" id="returnbt3" onclick="returnback3()">hide details</button>
            </div>
            </div>
    </div>
    </div>
</div>
    <script src="our_trainers.js"> </script>
    </body>
    </html>
        