<?php 
    require_once("../db_conn.php");
    // if(isset($_POST['new-profile'])) {
        
    // }
    $userId = (isset($_POST['userId'])) ? $_POST['userId'] : "user id not set";
    if(isset($_POST['new-fname'])) {
        $fname = $_POST['new-fname'];
        $sqlEdit = "UPDATE user SET fname='$fname' WHERE id='$userId' ";
        
        if(mysqli_query($conn, $sqlEdit)) {
            echo "Successfully edited fname " ;
        } else {
            echo "Something's wrong with editing the fname " ;
        }
    }
    if(isset($_POST['new-lname'])) {
        $lname = $_POST['new-lname'];
        $sqlEdit = "UPDATE user SET lname='$lname' WHERE id='$userId' ";
        
        if(mysqli_query($conn, $sqlEdit)) {
            echo "Successfully edited lname " ;
        } else {
            echo "Something's wrong with editing the lname " ;
        }
    }
    if(isset($_POST['new-uname'])) {
        $uname = $_POST['new-uname'];
        $sqlEdit = "UPDATE user SET username='$uname' WHERE id='$userId' ";
        
        if(mysqli_query($conn, $sqlEdit)) {
            echo "Successfully edited uname" ;
        } else {
            echo "Something's wrong with editing the uname" ;
        }
    }
    if(isset($_POST['new-email'])) {
        $email = $_POST['new-email'];
        $sqlEdit = "UPDATE user SET useremail='$email' WHERE id='$userId' ";
        
        if(mysqli_query($conn, $sqlEdit)) {
            echo "Successfully edited email" ;
        } else {
            echo "Something's wrong with editing the email" ;
        }
    }
    if(isset($_POST['new-gender'])) {
        $gender = (isset($_POST['new-gender'])) ? $_POST['new-gender'] : "gender not set";
        $sqlEdit = "UPDATE user SET gender='$gender' WHERE id='$userId' ";
        
        if(mysqli_query($conn, $sqlEdit)) {
            echo "Successfully edited gender"  ;
        } else {
            echo "Something's wrong with editing the gender" ;
        }
    }
    if(isset($_POST['new-points'])) {
        $points = $_POST['new-points'];
        $sqlEdit = "UPDATE user SET points='$points' WHERE id='$userId' ";
        
        if(mysqli_query($conn, $sqlEdit)) {
            echo "Successfully edited points" ;
        } else {
            echo "Something's wrong with editing the points" ;
        }
    }
?>