<?php 
    if(isset($_POST['fname'])){
        $fname = $_POST['fname'];
          if(isValidFullName($fname)) {
                echo "Fname is ok";
            } else {
                echo "Fname is not ok";
            }
    }
    if(isset($_POST['lname'])) {
        $lname = $_POST['lname'];
        if(isValidFullName($lname)) {
            echo "Lname is ok";
        } else {
            echo "Lname is not ok";
        }
    
    }
    
    function isValidFullName($name) {
        if (strlen($name) < 8) {
            return true;
        }

        return false;
    }

?>