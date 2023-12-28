<?php 
    require_once("../db_conn.php");
    if(isset($_GET['user_id'])) {
        $userId = (isset($_GET['user_id'])) ? $_GET['user_id'] : "user id not set";
    }

    $sqlSelection = "SELECT * FROM user WHERE id = '$userId'";
    $results = mysqli_query($conn, $sqlSelection);
    if(mysqli_num_rows($results) > 0) {
        echo "Selection successful"
    } else {
        echo "Selection failed";
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
    <form action="upload_handler.php" method="POST">
        <?php foreach(): ?>
            <h1>Name:</h1>

        <? endforeach; ?>
    </form>
</body>
</html>