<?php
 include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ask Queestions</title>
        <link rel="stylesheet" href="faq.css?v=<?php echo time(); ?>">
    </head>
<body>
    <div class="bg-image"><!--background image-->
        <!--navigation bar-->
        <nav>
            <div class="navlink" id="navLinks">
                <ul>
                    <li><a  href="">HOME</a></li>
                    <li><a href="">COURSE</a></li>
                    <li><a href="">SHOP</a></li>
                    <li class="active"><a href="/about us.html">ABOUT US</a></li>
                    <li style="float: right;"><img src="../../wallpapers/203536.png" alt="profile" class="profile"></li>
                </ul>
            </div>
        </nav>
        <!--page navigation bar-->
        <nav class="pnav">
            <div class="page-nav">
                <ul>
                    <li><a href="http://localhost/navigation%20bar/about%20us%20page/about%20us.php">About FitTutor</a></li>
                    <li ><a href="http://localhost/navigation%20bar/TRAINER%20DETAILS%20PAGE/OUR%20TRAINERS.html">Our Trainers</a></li>
                    <li class="active"><a href="http://localhost/navigation%20bar/faq/faq.html">FAQ</a></li>
                </ul>
            </div>
        </nav>
        <!--page body-->
        <a href="http://localhost/navigation%20bar/faq/submitquestions.html">
            <button type="button" name="askquestion" id="ask" class="ask">Ask Question</button></a>
        <table id="displaytable">
            <tr>
                <th>Question id</th>
                <th>Question</th>
                <th>Operations</th>
            </tr>
            
            <?php
        // sql code
            $sql="SELECT * FROM `questions`";
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