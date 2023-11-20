<?php 
    session_start();
    $userId = $_SESSION['userId'];
    include "../db_conn.php";
    $selectionSql = "SELECT badges FROM user WHERE id='$userId'";
    $result = mysqli_query($conn, $selectionSql);
    $data = mysqli_fetch_assoc($result);
    $badges = explode(",", $data['badges']);
    
    
    $conn->close();

    
?>
<div>
    <?php print_r($badges)?>
    <img src="asd" alt="">
    
</div>