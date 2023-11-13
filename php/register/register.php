<?php 

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "mathwiz_database";

    $conn = mysqli_connect($host, $username, $password, $database);
   
    session_start();

    
    if(isset($_POST)) {
        $userEmail = htmlspecialchars($_POST['email']);
        $userPassword = htmlspecialchars($_POST['password']);
        $selectionSql = "SELECT * FROM user WHERE useremail = '$userEmail' AND userpassword = '$userPassword'";
        $result = mysqli_query($conn, $selectionSql);

        if(mysqli_num_rows($result) > 0) {
            echo "User is already registered";
        } else {
            $dateRegistration = date("Y-m-d");
            $userEmail = $_POST['email'];
            $userPassword = $_POST['password'];
            $selectionSql = "INSERT INTO user(useremail, userpassword, flagptindicator, dateregistration) VALUES('$userEmail', '$userPassword', '1', '$dateRegistration')";
    
            mysqli_query($conn, $selectionSql);
            echo "Insertion Completed";
            
            $conn->close();
        }
       

    }

?>