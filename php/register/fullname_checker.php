<?php 

    if(isset($_POST['fname'])){
        $fname = htmlspecialchars($_POST['fname']);
        echo isValidFullName($fname);
    }

    if(isset($_POST['lname'])) {
        $lname = htmlspecialchars($_POST['lname']);
        echo isValidFullName($lname);
    }

    function isValidFullName($name) {
        if (strlen($name) < 8) {
            return true;
        }

        return false;
    }


?>