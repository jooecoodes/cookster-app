<?php 
    require_once("../db_conn.php");

    if(isset($_GET['id'])) {
        $id = (isset($_GET['id'])) ? $_GET['id'] : "id not set";
    }
   
    $sqlSelectionContent = "SELECT * FROM articles WHERE id = '$id' ";
    $results = mysqli_query($conn, $sqlSelectionContent);  
    $title = "";
    $video = "";
    $content = "";
    if(mysqli_num_rows($results) > 0) {
        while($row = mysqli_fetch_assoc($results)) {
            $title = $row['title'];
            $video = $row['video'];
            $content = $row['content'];
        }
    } else {
        echo "No results";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="article-container">
        <h1><?= $title ?></h1>
        <?= $video ?>
        <article>
            <?= $content ?>
        </article>
    </div>
</body>
</html>