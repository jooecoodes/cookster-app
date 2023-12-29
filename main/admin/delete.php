<?php
require_once("../db_conn.php");
session_start();
$userCategory = (isset($_SESSION['usercategory'])) ? $_SESSION['usercategory'] : "category is not set";
if (isset($_SESSION['userId']) && $userCategory == 'admin') {
    if(isset($_GET['user_id'])) {
        $userId = $_GET['user_id'];
    } 
    $sqlDelete = "DELETE FROM user WHERE id='$userId'";
    if(mysqli_query($conn, $sqlDelete)) {
        echo "Successfully deleted data";
    } else {
        echo "Something's wrong in deleting data";
    }
   
} else {
    echo "You're not authorized or logged in";
}
