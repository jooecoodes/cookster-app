<?php 

    include "../db_conn.php";
   
    session_start();

    
    if(isset($_POST['email'])) {
        $userEmail = htmlspecialchars($_POST['email']);
        $userPassword = htmlspecialchars($_POST['password']);
        $userFName = htmlspecialchars($_POST['fname']);
        $userLName = htmlspecialchars($_POST['lname']);
        $userGender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : 'lol';
        $selectionSql = "SELECT * FROM user WHERE useremail = '$userEmail' AND userpassword = '$userPassword'";
        $result = mysqli_query($conn, $selectionSql);
        var_dump($_POST);

        if(mysqli_num_rows($result) > 0) {
            echo "User is already registered";
        } else {
            $dateRegistration = date("Y-m-d");
            $userEmail = $_POST['email'];
            $userPassword = $_POST['password'];
            $insertionSql = "INSERT INTO user(useremail, userpassword, flagptindicator, dateregistration, fname, lname, gender) VALUES('$userEmail', '$userPassword', '1', '$dateRegistration', '$userFName', '$userLName', '$userGender')";
            mysqli_query($conn, $insertionSql);
            echo "Insertion Completed";
            $conn->close();
        }
    }

?>