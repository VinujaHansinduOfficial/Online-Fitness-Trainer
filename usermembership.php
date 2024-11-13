<?php
// process_membership.php
require 'config2.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the selected membership package from the form
    if (isset($_POST['membership'])) {
        $membershipPackage = $_POST['membership'];

        // Insert the membership package into the database
        $sql = "INSERT INTO membership(userId, membership_type) SELECT usersId, '$membershipPackage' FROM users ORDER BY usersId DESC LIMIT 1";

        if ($conn->query($sql) === TRUE) {
            echo "Membership package '$membershipPackage' has been selected";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the connection
        $conn->close();
    }
}
?>
