<?php
require_once("../db_conn.php");
session_start();

if (isset($_SESSION['userId'])) {
    $dataStorer = [];
    if (isset($_GET['search-bar-field']) || isset($_GET['difficulty-field'])) {
        $difficulty = $_GET['difficulty-field'];
        $search = "%" .  $_GET['search-bar-field'] . "%";

        $stmt = $conn->prepare("SELECT * FROM articles WHERE title LIKE ? AND difficulty = ? ");
        $stmt->bind_param("ss", $search, $difficulty);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $dataStorer[] = $row;
        }
    } else {

        // Display all articles if no search criteria is provided
        $sqlSelectAllContent = "SELECT * FROM articles";
        $results = mysqli_query($conn, $sqlSelectAllContent);
        while ($row = mysqli_fetch_assoc($results)) {
            $dataStorer[] = $row;
        }
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
        <form action="" method="GET">
            <label for="searchBarField">Search: </label>
            <input type="text" name="search-bar-field" id="searchBarField">
            <label for="difficultyField">Difficulty: </label>
            <select name="difficulty-field" id="difficultyField">
                <option value="easy">Easy</option>
                <option value="normal">Normal</option>
                <option value="hard">Hard</option>
            </select>

            <input type="submit">
        </form>
        <div id="article-container">
            <?php if (count($dataStorer) > 0) {?>
            <?php foreach ($dataStorer as $data) : ?>
                <div class="articles">
                    <a href="article.php?id=<?= $data['id'] ?>">
                        <h1><?= $data['title'] ?></h1>
                    </a>
                    <label for="">Dificulty: </label>
                    <p><?= $data['difficulty'] ?></p>
                </div>
            <?php endforeach; ?>
            <?php } else {?>
                <p>No results found</p>
            <?php }?>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: ../login/");
}
