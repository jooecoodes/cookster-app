<?php 
    session_start();

    // check user is login
    if(isset($_SESSION['userId'])) {
        header("Location: ./profile/");
    } else {
        header("Location: ./login/");
    }
?>
