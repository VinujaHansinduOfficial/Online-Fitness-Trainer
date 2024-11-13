<?php
// connect with database
 include 'connect.php';

 $MID=$_COOKIE["member_id"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ask Questions</title>
        <link rel="stylesheet" href="faq.css?v=<?php echo time(); ?>">
    </head>
<body>
    <div class="bg-image"><!--background image-->
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
        <a href="http://localhost/Assignment/faq/submitquestions.php">
            <button type="button" name="askquestion" id="ask" class="ask">Ask Question</button></a>
        <table id="displaytable">
            <tr>
                <th>Question id</th>
                <th>Question</th>
                <th>Operations</th>
            </tr>
            
            <?php
        // sql code
        $sql="SELECT * FROM `questions` WHERE MID=$MID";
        // code execution
            $result=mysqli_query($conn,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $question=$row['question'];
                    $qid=$row['QID'];

                    echo "<tr>
                        <td>".$qid."</td>
                        <td>".$question."</td>
                        <td>
                        <a href='edit.php?updateid=".$qid."'><button type='button' class='display' id='update'>Edit</button></a>
                        <a href='delete.php?deleteid=".$qid."'><button type='button' class='display' id='delete'>Delete</button></a>   
                        </td>
                        </tr>"; 
                }
                
            }
            ?>
            



        </table>
</body>
</html>