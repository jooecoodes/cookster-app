<?php
require_once("../db_conn.php");
session_start();
$userCategory = (isset($_SESSION['usercategory'])) ? $_SESSION['usercategory'] : "category is not set";
if (isset($_SESSION['userId']) && $userCategory == 'admin') {
    if (isset($_GET['user_id'])) {
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

    if (mysqli_num_rows($results) > 0) {
        echo "Selection successful";
        while ($row = mysqli_fetch_assoc($results)) {
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
            <img src="../../assets/profile/<?= $profile ?>" alt="">
            <form action="edit_handler.php" method="POST">
                <input type="hidden" name="userId" value="<?= $userId ?>">
                <input type="file" name="new-profile">
                <input type="submit" value="Edit">
            </form>
            <h1>First Name: </h1>
            <?= $fname ?>
            <form action="edit_handler.php" method="POST">
                <input type="hidden" name="userId" value="<?= $userId ?>" >
                <input type="text" name="new-fname" id="newFnameField" placeholder="Edit First Name">
                <input type="submit"  value="Edit">
            </form>
            <h1>Last Name: </h1>
            <?= $lname ?>
            <form action="edit_handler.php" method="POST">
                <input type="hidden" name="userId" value="<?= $userId ?>">

                <input type="text" name="new-lname" id="newLnameField" placeholder="Edit Last Name">
                <input type="submit" value="Edit">
            </form>
            <h1>Username: </h1>
            <?= $name ?>
            <form action="edit_handler.php" method="POST">
                <input type="hidden" name="userId" value="<?= $userId ?>">

                <input type="text" name="new-uname" id="newUnameField" placeholder="Edit Username">
                <input type="submit"value="Edit">
            </form>
            <h1>Email:</h1>
            <?= $email ?>
            <form action="edit_handler.php" method="POST">
                <input type="hidden" name="userId" value="<?= $userId ?>">

                <input type="text" name="new-email" id="newEmailField" placeholder="Edit Email">
                <input type="submit" value="Edit">
            </form>
            <h1>Gender:</h1>
            <?= $gender ?>
            <form action="edit_handler.php" method="POST">
                <input type="hidden" name="userId" value="<?= $userId ?>">

                <select name="new-gender" id="newGenderField">
                    <option value="other">Other</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <input type="submit" value="Edit">
            </form>
            <h1>Points: </h1>
            <?= $points ?>
            <form action="edit_handler.php" method="POST">
                <input type="hidden" name="userId" value="<?= $userId ?>">

                <input type="number" name="new-points" id="new=PointsField" placeholder="Enter Points" >
                <input type="submit" value="Edit">
            </form>

    </body>

    </html>

<?php
} else {
    echo "You're not authorized or logged in";
}
