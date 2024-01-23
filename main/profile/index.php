<?php
require_once("../db_conn.php");
session_start();

$userCategory = (isset($_SESSION['usercategory'])) ? $_SESSION['usercategory'] : "category is not set";
//check if admin
if (isset($_SESSION['userId']) && $userCategory == 'admin') {
    header("Location: ../admin/");
    die;
}
// checks if login and a regular user
if (isset($_SESSION['userId']) && $userCategory == 'user') {

    $userId =  $_SESSION['userId'];
    $userProfilePath = (empty($_SESSION['userprofile'])) ? '' : $_SESSION['userprofile'];
    $profileBlankFlag = (empty($userProfilePath)) ? true : false;
    $userProfile;
    $userGender = (empty($_SESSION['userGender'])) ?  '' : $_SESSION['userGender'];
    if ($profileBlankFlag) {
        if (empty($userGender)) {
            $userProfile = 'default-question-profile.png';
        }
        if ($userGender == "male") {
            $userProfile = 'default-male-profile.jpg';
        }
        if ($userGender == 'female') {
            $userProfile = 'default-female-profile.jpg';
        }
    } else {
        $userProfile = $userProfilePath;
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="profile.js"></script>
        <link rel="stylesheet" href="../../styles/css/profile.css">
        <title>Document</title>
    </head>

    <body>
        <header>
            <?= include "../components/logged-in-nav.php" ?>
        </header>
        <main>
            <div id="containerProfile">

                <div id="profileUpperLeftSide">
                    <div id="dividerUpperLeftSide">
                        <div id="dividerEditProfile">
                            <a href="edit-profile.php"><img src="<?php echo "../../assets/profile/" . $userProfile ?>" alt="profile" id="userProfile"></a>
                        </div>

                        <p id="greeting-text">Hello, <?= $_SESSION['userFname'] . " " . $_SESSION['userLname']; ?> </p>

                    </div>
                    <div id="dividerUpperLeftSide2">
                        <img src="../../assets/star.png" alt="star" id="starImage">
                        <?php
                        // update score in the session from db
                        $userPoints = 0;
                        $sqlSelectPoints = "SELECT points FROM user WHERE id = ?";
                        $stmtSelectPoints = $conn->prepare($sqlSelectPoints);
                        $stmtSelectPoints->bind_param("i", $_SESSION['userId']);
                        $stmtSelectPoints->execute();

                        $result = $stmtSelectPoints->get_result();
                        $rows = $result->fetch_all(MYSQLI_ASSOC);

                        if (!empty($rows)) {
                            foreach ($rows as $row) {
                                $userPoints = $row['points'];
                            }
                        }

                        $_SESSION['userPoints'] = $userPoints;

                        ?>
                        <span><?= $_SESSION['userPoints'] ?></span>
                    </div>

                </div>
                <div id="profileLowerLeftSide">
                    <h1>Badges:</h1>
                    <div id="displayBadges">
                    </div>
                    <div id="buttons-profile-badge-logout">
                        <button id="badgeBttn">Retrieve Badges</button>
                        <button id="logoutBttn">Log out</button>
                    </div>
                    
                </div>



            </div>
        </main>


    </body>

    </html>

<?php

} else {
    header("Location: ../login/");
}


?>