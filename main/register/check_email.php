<?php 
require_once("../db_conn.php");


if(isset($_POST['email'])) {
    $userEmail = htmlspecialchars($_POST['email']);
    $selectionSql = "SELECT * FROM user WHERE useremail = '$userEmail'";
    $result = mysqli_query($conn, $selectionSql);
    $identifier = verifyEmail($userEmail);

    if(mysqli_num_rows($result) > 0) {
        // email already exists
        echo "3";
    } else {
        if($identifier) {
            // email is valid
            echo "1";
         } else {
            // email is invalid
             echo "2";
         }
    }
    

  
}

function verifyEmail($email) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}


?>