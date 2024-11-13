<html>
<head>
    <title>Our trainers</title>
    <link rel="stylesheet" href="faq.css?v=<?php echo time(); ?>">
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
        <!--page navigation bar-->
        <nav class="pnav">
            <div class="page-nav">
                <ul>
                    <li><a href="http://localhost/Assignment/about%20us%20page/about%20us.php">About FitTutor</a></li>
                    <li ><a href="http://localhost/Assignment/TRAINER%20DETAILS%20PAGE/OUR%20TRAINERS.php">Our Trainers</a></li>
                    <li class="active"><a href="http://localhost/Assignment/faq/faq.php">FAQ</a></li>
                </ul>
            </div>
        </nav>
        <!--page body-->
        <header>FAQ.</header>
    <!-------------question 1------------>
        <div class="QA">
            <div class="question">
                <button type="button" id="1" onclick="showcontent(this)">What qualifications do your trainers have?</button>
            </div>
            <div class="answer" id="answer1" style="display: none;">
                <h4>Our trainers are highly qualified professionals with certifications in personal training, fitness coaching,
                     and relevant fitness specialties. They possess extensive knowledge and experience in designing effective 
                     workout programs tailored to individual needs.</h4>
            </div>
        </div>
<!-------------question 2------------>
    <div class="QA">
        <div class="question">
            <button type="button" onclick="showcontent(this);" id="2">How do I get started with an online fitness trainer?</button>
        </div>
        <div class="answer" id="answer2" style="display: none;">
            <h4>To get started, simply sign up on our website and create an account. Once you're registered, you can browse through
                 our team of trainers and choose one that aligns with your goals. You can then schedule an initial consultation or assessment
                  to discuss your objectives and establish a plan.</h4>
        </div>
    </div>
<!-------------question 3------------>
    <div class="QA">
        <div class="question">
            <button type="button" id="3" onclick="showcontent(this)">How does online fitness training work?</button>
        </div>
        <div class="answer" id="answer3" style="display: none;">
            <h4>Online fitness training allows you to receive personalized workout programs, nutritional guidance, and ongoing support from a
                 qualified trainer, all through digital platforms. Your trainer will communicate with you through video calls, messaging, and email,
                  providing guidance, monitoring progress, and making adjustments as needed.</h4>
        </div>
    </div>
<!-------------question 4------------>
    <div class="QA">
        <div class="question">
            <button type="button" id="4" onclick="showcontent(this)">What equipment do I need for online fitness training?</button>
        </div>
        <div class="answer" id="answer4" style="display: none;">
            <h4>The equipment required for online fitness training depends on your specific goals and the programs designed by your trainer. While 
                some workouts can be done with minimal equipment or bodyweight exercises, others may require additional equipment such as dumbbells,
                 resistance bands, stability balls, or a yoga mat. Your trainer will guide you on the equipment needed for your workouts.</h4>
        </div>
    </div>
<!-------------ask your own question section------------>
    <div class="askq">
        <a href="http://localhost/Assignment/faq/submitquestions.php"><button type="button" id="ask questions" class="askb">Ask Your Question</button></a>
        <a href="http://localhost/Assignment/faq/display.php"><button type="button" id="ask questions" class="askb">Show Asked Questions.</button></a>
    </div>
    <script src="faq.js"> </script>
    </body>
    </html>
        