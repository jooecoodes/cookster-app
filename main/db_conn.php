<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "mathwiz_database";

    $conn = mysqli_connect($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>