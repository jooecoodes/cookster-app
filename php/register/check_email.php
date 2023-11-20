<?php 

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "mathwiz_database";

    $conn = mysqli_connect($host, $username, $password, $database);


if(isset($_POST['email'])) {
    $userEmail = htmlspecialchars($_POST['email']);
    $selectionSql = "SELECT * FROM user WHERE useremail = '$userEmail'";
    $result = mysqli_query($conn, $selectionSql);
    $identifier = verifyEmail($userEmail);

    if(mysqli_num_rows($result) > 0) {
        echo "userexist";
    } 
    if($identifier) {
       echo "Email is valid";
    } else {
        echo "Email is invalid";
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