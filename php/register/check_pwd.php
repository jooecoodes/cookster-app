<?php 
    if(isset($_POST)) {
        $password = $_POST['password'];
        echo isStrongPassword($password);

    }   


    function isStrongPassword($password) {
       
        if (strlen($password) < 8) {
            return false;
        }

        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            return false;
        }
       
        return true;
    }
?>