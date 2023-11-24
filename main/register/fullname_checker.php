<?php 
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
                } else {
                    $arrayHolder[0] = 0;
                }
    }
    if(isset($_POST['fname'])){
        $fname = $_POST['fname'];
          if(isValidFullName($fname)) {
                $arrayHolder[1] = 1;
            } else {
                $arrayHolder[1] = 0;
            }
    }
    if(isset($_POST['lname'])) {
        $fname = $_POST['lname'];
        if(isValidFullName($lname)) {
            $arrayHolder[2] = 1;
        } else {
            $arrayHolder[2] = 0;
        }
    
    }
  
   
   
    function identifyData($fname, $lname) {
        include '../db_conn.php';
            if(isset($_POST['checkfullname'])) {
                
              
            } else {
                $arrayHolder[0] = 0;
            }
            
          

            if(isValidFullName($fname)) {
                $arrayHolder[1] = 1;
            } else {
                $arrayHolder[1] = 0;
            }
        

           

        return $arrayHolder;
    
    }
    
    
    function isValidFullName($name) {
        if (strlen($name) < 8) {
            return true;
        }

        return false;
    }

?>