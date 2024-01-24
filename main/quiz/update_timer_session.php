<?php 
    session_start();
    if(isset($_POST['timeLeft'])) {
        $_SESSION['quizTimer'] = $_POST['timeLeft'];
    } else {
        echo "Failed to edit timer session";
    }

?>