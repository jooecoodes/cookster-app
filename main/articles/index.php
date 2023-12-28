<?php
require_once("../db_conn.php");

$sqlSelectAllContent = "SELECT * FROM articles";
$results = mysqli_query($conn, $sqlSelectAllContent);
if (mysqli_num_rows($results) > 0) {
    echo "Successfully selected all content";
} else {
    echo "Something's wrong in selecting all content";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #article-container {
            display: flex;
            flex-direction: column;

        }
    </style>
</head>

<body>
    <form action="">
        <label for="searchBarField">Search: </label>
        <input type="text" name="search-bar-field" id="searchBarField">
        <label for="difficultyField">Difficulty: </label>
        <select name="difficulty-field" id="difficultyField">
            <option value="easy">Easy</option>
            <option value="normal">Normal</option>
            <option value="hard">Hard</option>
        </select>

        <input type="submit" name="submit" value="Search">
    </form>
    <div id="article-container">
        <?php foreach ($results as $result) : ?>
            <div class="articles">
                <a href="?<?= $result['id'] ?>">
                    <p><?= $result['title']?></p>
                </a>
                <label for="">Dificulty: </label>
                <p><?= $result['difficulty'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>