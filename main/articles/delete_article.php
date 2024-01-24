<?php 
    require_once("../db_conn.php");
    session_start();
    $userCategory = (isset($_SESSION['usercategory'])) ? $_SESSION['usercategory'] : "category is not set";
    if(isset($_SESSION['userId']) && $userCategory == "admin") {
        if(isset($_GET['id'])) {
            $articleId = $_GET['id'];
            $sqlDelete = "DELETE FROM articles WHERE id = ?";
            $stmtDeleteArticle = $conn->prepare($sqlDelete);
            $stmtDeleteArticle->bind_param("i", $articleId);
            $stmtDeleteArticle->execute();
    
            
            if($stmtDeleteArticle->affected_rows > 0) {
                echo "Successfully deleted article";
            } else {
                echo "Field to delete article";
            }
        }
    } else {
        echo "You're not authorized to view this page or you're not logged in";
    }

?>