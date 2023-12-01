<?php 
<<<<<<< HEAD
    if(isset($_POST['fname'])){
        $fname = $_POST['fname'];
          if(isValidFullName($fname)) {
                echo "Fname is ok";
            } else {
                echo "Fname is not ok";
=======
    include '../db_conn.php';
    $arrayHolder = array_fill(0, 2, 0);
    if(isset($_POST['checkfullname'])) {
        $fnameFromCheck = (isset($_POST['fnameVal'])) ? $_POST['fnameVal'] : "";
        $lnameFromCheck = (isset($_POST['lnameVal'])) ? $_POST['lnameVal'] : "";
        $selectSql = "SELECT * FROM user WHERE fname='$fnameFromCheck' AND lname='$lnameFromCheck'";
                $result = mysqli_query($conn, $selectSql);
                if($result) {
                    // echo "Full name is already taken";
                    $arrayHolder[0] = 1;
                    echo json_decode($arrayHolder);
                } else {
                    $arrayHolder[0] = 0;
                    echo json_decode($arrayHolder);
                }
    }
    if(isset($_POST['fname'])){
        $fname = $_POST['fname'];
          if(isValidFullName($fname)) {
                $arrayHolder[1] = 1;
                echo json_decode($arrayHolder);
            } else {
                $arrayHolder[1] = 0;
                echo json_decode($arrayHolder);
>>>>>>> origin/master
            }
    }
    if(isset($_POST['lname'])) {
        $lname = $_POST['lname'];
        if(isValidFullName($lname)) {
<<<<<<< HEAD
            echo "Lname is ok";
        } else {
            echo "Lname is not ok";
        }
    
    }
    
=======
            $arrayHolder[2] = 1;
            echo json_decode($arrayHolder);
        } else {
            $arrayHolder[2] = 0;
            echo json_decode($arrayHolder);
        }
    
    }
>>>>>>> origin/master
    function isValidFullName($name) {
        if (strlen($name) < 8) {
            return true;
        }

        return false;
    }

?>