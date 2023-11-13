<?php 

     $host = "localhost";
     $username = "root";
     $password = "";
     $database = "mathwiz_database";
 
     $conn = mysqli_connect($host, $username, $password, $database);

     $userEmail = $_POST['email'];
     $userPassword = $_POST['password'];
     $selectionSql = "SELECT * FROM user WHERE useremail = '$userEmail' AND userpassword = '$userPassword' ORDER BY points DESC";
     $result = mysqli_query($conn, $selectionSql);
     $dataStorer = [];
     
     if(mysqli_num_rows($result) > 0) {
         while ($rows = mysqli_fetch_assoc($result)) {
            $dataStorer = $rows;
         }
            $conn->close();
    }
    echo json_encode($dataStorer);
?>