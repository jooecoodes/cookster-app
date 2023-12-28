<?php 
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <div id="article-containe">

    </div>
</body>
</html>