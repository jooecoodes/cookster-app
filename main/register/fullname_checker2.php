<?php 
    include '../db_conn.php';
    if(isset($_POST['checkfullname'])) {
        $fnameFromCheck = (isset($_POST['fname'])) ? $_POST['fname'] : "";
        $lnameFromCheck = (isset($_POST['lname'])) ? $_POST['lname'] : "";
        $selectSql = "SELECT * FROM user WHERE fname='$fnameFromCheck' AND lname='$lnameFromCheck'";
        $result = mysqli_query($conn, $selectSql);
                if(mysqli_num_rows($result) > 0) {
                    echo "Full name is already taken";
                } else {
                    echo "Full name is ok";
                }
    }

?>