<?php
require_once("../db_conn.php");

if (isset($_POST['submit-article-content-form'])) {
    $iframe = (isset($_POST['video-iframe-article-container'])) ? $_POST['video-iframe-article-container'] : "video not set";
    $content = (isset($_POST['content-article'])) ? $_POST['content-article'] : "content not set";
    $difficulty = (isset($_POST['difficulty-article'])) ? $_POST['difficulty-article'] : "difficulty not set";

    if (empty($iframe) && empty($content) && empty($difficulty)) {
        echo "All fields must be filled";
    } else {
          // insertion 
          $insertionSql = "INSERT INTO articles(video, content, difficulty) VALUES('$iframe', '$content', '$difficulty')";

          if (mysqli_query($conn, $insertionSql)) {
              echo "Insertion Successful";
          } else {
              echo "Something's wrong with the insertion process";
          }
    }
} else {
    echo "Something's wrong in sending the data";
}
