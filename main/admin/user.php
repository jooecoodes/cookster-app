<?php 
    require_once("../db_conn.php");
    if(isset($_GET['user_id'])) {
        $userId = (isset($_GET['user_id'])) ? $_GET['user_id'] : "user id not set";
    }

    $sqlSelection = "SELECT * FROM user WHERE id = '$userId'";
    $results = mysqli_query($conn, $sqlSelection);
    $id = "";
    $profile =  "";
    $fname = "";
    $lname =  "";
    $name =  "";
    $email =  "";
    $gender = "";
    $points = "";

    if(mysqli_num_rows($results) > 0) {
        echo "Selection successful";
        while($row = mysqli_fetch_assoc($results)) {
            $id = $row['id'];
            $profile = $row['userprofile'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $name = $row['username'];
            $email = $row['useremail'];
            $gender = $row['gender'];
            $points = $row['points'];
        }
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
       <h1>ID: </h1>
       <?= $id ?>
       <h1>Profile</h1>
       <?= $profile ?>
       <h1>First Name: </h1>
       <?= $fname ?>
       <h1>Last Name: </h1>
       <?= $lname ?>
       <h1>Username: </h1>
       <?= $name ?>
       <h1>Email:</h1>
       <?= $email ?>
       <h1>Gender:</h1>
       <?= $gender ?>
       <h1>Points: </h1>
       <?= $points ?>
    </form>
</body>
</html>