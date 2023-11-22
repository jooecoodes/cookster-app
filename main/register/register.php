<?php 

    include "../db_conn.php";
   
    session_start();

    
    if(isset($_POST['email'])) {
        $userEmail = htmlspecialchars($_POST['email']);
        $userPassword = htmlspecialchars($_POST['password']);
        $userFName = htmlspecialchars($_POST['fname']);
        $userLName = htmlspecialchars($_POST['lname']);
        $selectionSql = "SELECT * FROM user WHERE useremail = '$userEmail' AND userpassword = '$userPassword'";
        $result = mysqli_query($conn, $selectionSql);

        if(mysqli_num_rows($result) > 0) {
            echo "User is already registered";
        } else {
            $dateRegistration = date("Y-m-d");
            $userEmail = $_POST['email'];
            $userPassword = $_POST['password'];
            $insertionSql = "INSERT INTO user(useremail, userpassword, flagptindicator, dateregistration, fname, lname) VALUES('$userEmail', '$userPassword', '1', '$dateRegistration', '$userFName', '$userLName')";
            mysqli_query($conn, $insertionSql);
            echo "Insertion Completed";
            
            $conn->close();
        }
       

    }

?>