<?php 
    require_once("../db_conn.php");
    session_start();
    $userCategory = (isset($_SESSION['usercategory'])) ? $_SESSION['usercategory'] : "category is not set";
    if(isset($_SESSION['userId']) && $userCategory == "admin") {
        $sqlDelete = "DELETE FROM articles WHERE id = ?";
        $stmt = $conn->prepare($sqlDelete);
        
        if($stmt->execute()) {
            echo "Successfully deleted article";
        } else {
            echo "Field to delete article";
        }
    } else {
        echo "You're not authorized to view this page or you're not logged in";
    }

?>