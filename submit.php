<?php
    include_once 'config1.php';
?>

<?php

    if (isset($_COOKIE["member_id"])) {
      $mID = $_COOKIE["member_id"];
    }

    $name_of_member = $_POST["name"];
    $age = $_POST["age"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $start_date = $_POST["start_date"];
    $trainer_name = $_POST["trainer_name"];
    $duration = $_POST["Duration"];
    $short_goal = $_POST["short_goal"];
    $workout_type = $_POST["workout_type"];
    $long_goal = $_POST["long_goal"];
    $Intensity = $_POST["Intensity"];
    $taring_history = $_POST["taring_history"];
    $hip = $_POST["hip"];
    $waist = $_POST["waist"];
    $username = $_POST["username"];

    $query = "SELECT * FROM usersinf WHERE mID = '$mID'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $updateQuery = "UPDATE usersinf SET ";
        $updateFields = array();

        if (!empty($name_of_member)) {
            $updateFields[] = "name_of_member = '$name_of_member'";
        }
        if (!empty($age)) {
            $updateFields[] = "age = $age";
        }
        if (!empty($height)) {
            $updateFields[] = "height = $height";
        }
        if (!empty($weight)) {
            $updateFields[] = "weight='$weight'";
        }
        if (!empty($start_date)) {
            $updateFields[] = "start_date='$start_date'";
        }
        if (!empty($trainer_name)) {
            $updateFields[] = "trainer_name='$trainer_name'";
        }
        if (!empty($duration)) {
            $updateFields[] = "duration='$duration'";
        }
        if (!empty($short_goal)) {
            $updateFields[] = "short_goal='$short_goal'";
        }
        if (!empty($workout_type)) {
            $updateFields[] = "workout_type='$workout_type'";
        }
        if (!empty($long_goal)) {
            $updateFields[] = "long_goal='$long_goal'";
        }
        if (!empty($Intensity)) {
            $updateFields[] = "Intensity='$Intensity'";
        }
        if (!empty($taring_history)) {
            $updateFields[] = "taring_history='$taring_history'";
        }
        if (!empty($hip)) {
            $updateFields[] = "hip='$hip'";
        }
        if (!empty($username)) {
            $updateFields[] = "username='$username'";
        }
        if (!empty($waist)) {
            $updateFields[] = "waist='$waist'";
        }


        // Add other fields to update as needed
        if (!empty($waist) OR !empty($username) OR !empty($hip) OR !empty($taring_history) OR !empty($Intensity) OR !empty($long_goal) OR !empty($workout_type) OR !empty($short_goal) OR !empty($duration) OR !empty($trainer_name) OR !empty($start_date) OR !empty($weight) OR !empty($weight) OR !empty($height) OR !empty($age) OR !empty($name_of_member)) {
          $updateQuery .= implode(", ", $updateFields) . " WHERE mID = '$mID'";
          mysqli_query($conn, $updateQuery);
          header("Location: profile_page.php");
        } else {
          header("Location: profile_page.php");
        }



    } else {
        $sql = "INSERT INTO usersinf (mID, name_of_member, age, height, weight, start_date, username, trainer_name, duration, short_goal, long_goal, workout_type, Intensity, taring_history, hip, waist)
            VALUES ('$mID', '$name_of_member', '$age', '$height', '$weight', '$start_date', '$username', '$trainer_name', '$duration', '$short_goal', '$long_goal', '$workout_type', '$Intensity', '$taring_history', '$hip', '$waist')";

        if (mysqli_query($conn, $sql)) {
            header("Location: profile_page.php");
            exit;
        } else {
            echo "<script>alert('Error in Insertion')</script>";
        }
    }

    mysqli_close($conn);
?>
