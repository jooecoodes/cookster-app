<?php 

    include "../db_conn.php";
    session_start();

    if(isset($_POST['requestBadge'])) {
        $userId = (isset($_SESSION['userId'])) ? $_SESSION['userId'] : "user id not found";
        $selectionSql = "SELECT badges FROM user WHERE id='$userId'";
        $result = mysqli_query($conn, $selectionSql);
        $data = mysqli_fetch_assoc($result);
        $dataInArray = explode(',', $data['badges']);
        if($data) {
            echo json_encode($dataInArray);
        } else {
            echo "Error data";
        }  
    } else {
        echo "Error requesting";
    }

     
       
?>
