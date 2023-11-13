<?php 

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "mathwiz_database";

    $conn = mysqli_connect($host, $username, $password, $database);


if(isset($_POST)) {
    $userEmail = htmlspecialchars($_POST['email']);
    $selectionSql = "SELECT * FROM user WHERE useremail = '$userEmail'";
    $result = mysqli_query($conn, $selectionSql);

    if(mysqli_num_rows($result) > 0) {
        echo "userexist";
    } else {
       insert($userEmail, $conn);
    }
   

    function insert($userEmail, $conn) {
        $dateRegistration = date("Y-m-d");
        $userEmail = $_POST['email'];
        $selectionSql = "INSERT INTO user(useremail, userpassword, flagptindicator, dateregistration) VALUES('$userEmail', '$userPassword', '1', '$dateRegistration')";

        mysqli_query($conn, $selectionSql);
        echo "Insertion Completed";
        
        $conn->close();
    }
}


?>