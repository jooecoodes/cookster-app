<?php

// content
require_once("../db_conn.php");
// question 

if (isset($_POST['submit-article-quiz-form'])) {
    $numOfQuestions = (isset($_POST['num-of-questions'])) ?  $_POST['num-of-questions'] : "num of questions not set";

    for ($i = 0; $i < $numOfQuestions; $i++) {
        $question = $_POST["question{$i}"];
        $choices = $_POST["choices{$i}"];
        $answer = $_POST["answer{$i}"];
        $sqlInsertion = "INSERT INTO quiz(question, choices, answer) VALUES('$question', '$choices', '$answer')";
        mysqli_query($conn, $sqlInsertion);
       
    }
    echo "Successfully inserted quizes";
    die;
}

if (isset($_POST['submit-article-content-form'])) {
    $title = (isset($_POST['title-article'])) ? $_POST['title-article'] : "title not set";
    $iframe = (isset($_POST['video-iframe-article-container'])) ? $_POST['video-iframe-article-container'] : "video not set";
    $content = (isset($_POST['content-article'])) ? $_POST['content-article'] : "content not set";
    $difficulty = (isset($_POST['difficulty-article'])) ? $_POST['difficulty-article'] : "difficulty not set";

    if (empty($iframe) && empty($content) && empty($difficulty) && empty($title)) {
        echo "All fields must be filled";
    } else {
        // insertion 
        $insertionSql = "INSERT INTO articles(title, video, content, difficulty) VALUES('$title', '$iframe', '$content', '$difficulty')";

        if (mysqli_query($conn, $insertionSql)) {
            echo "Insertion Successful";
        } else {
            echo "Something's wrong with the insertion process";
        }
    }
} else {
    echo "Something's wrong in sending the data";
}

