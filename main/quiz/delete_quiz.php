<?php 
    require_once("../db_conn.php");

    if(isset($_GET['quizId'])) {
        $quizId = $_GET['quizId'];
        $sqlDeleteQuiz = "DELETE FROM quiz WHERE id = ?";
        $stmtDelete = $conn->prepare($sqlDeleteQuiz);
        $stmtDelete->bind_param("i", $quizId);

        $stmtDelete->execute();


        // delete if exist
        if($stmtDelete->affected_rows > 0) {
            echo "Successfully deleted quiz";
        } else {
            echo "Failed deleting quiz";
        }

    } else { 
        echo "Quiz id not set";
    }

?>