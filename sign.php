<?php
    require 'config2.php';

    $previous_uid= $conn->query("SELECT MAX(usersId) FROM users")->fetch_row()[0];
    $uid=$previous_uid+1;
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    setcookie("member_id", $uid, time() + 60*60*24*7*4, "/");


    $sql = "INSERT INTO users(usersId,usersName,usersEmail,usersPwd) VALUES('$uid', '$name', '$email', '$pwd')";
 $checkEmailQuery = "SELECT * FROM users WHERE usersEmail = '$email'";

    $result = mysqli_query($conn,$checkEmailQuery);

   if (mysqli_num_rows($result) > 0) {
    echo '
    <script>
        alert("Email already exists. Please choose a different email.");
        window.location.href = "sign.php";
    </script>';
    exit();
}


    if (mysqli_query($conn,$sql)) {
        echo '
        <script>
            alert("Account Created Successfully.Please Login To Account");
            window.location.href = "login.php";
        </script>';
    } else {
        echo '<script>alert("Error in Insertion");</script>';
    }

    $conn->close();
?>
