<?php
session_start();
include '../db_conn.php';

if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $selectionSql = "SELECT * FROM user WHERE id = $userId";
    $result = mysqli_query($conn, $selectionSql);
    $userUsername = '';
    $userProfile = '';
    $userPassword = '';
    $userFName = '';
    $userLName = '';
    $userGender = '';
    if (mysqli_num_rows($result) > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {
            $userUsername = $rows['username'];
            $userProfile = $rows['userprofile'];
            $userPassword = $rows['userpassword'];
            $userFName = $rows['fname'];
            $userLName = $rows['lname'];
            $userGender = $rows['gender'];
        }

        //html part edit
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="edit.js"></script>
            <link rel="stylesheet" href="../../styles/css/profile-edit.css">

            <title>Document</title>
        </head>

        <body>
            <header>
                <?php include "../components/logged-in-nav.php"; ?>
            </header>
            <main>
                <div id="profile-container">
                    <div class="centerer">
                        <div id="pfpDivider">
                            <img src="<?php echo "../../assets/profile/" . $userProfile ?>" alt="profile">
                        </div>
                    </div>

                    <div id="showDivider">
                        <p>User Password: <?php echo $userPassword ?></p>
                        <p>User Fname: <?php echo $userFName; ?></p>
                        <p>User Lname: <?php echo $userLName ?></p>
                    </div>

                    <div id="editDivider">

                        <!-- pfp  -->
                        <div class="pfpContainer edit-container">
                            <form id="uploadForm" action="profile.php" enctype="multipart/form-data" method="POST">
                                <label for="profile">Edit Profile:</label>
                                <input type="file" name="profile" id="profile">
                                <button type="submit" value="Submit" name="submit">Submit</button>
                            </form>
                        </div>
                        <!-- pwd  -->
                        <div class="pwdContainer edit-container">
                            <form id="pwd-edit-container" method="POST">
                                <input type="hidden" name="submit-btn-pwd" id="hidden-pwd">
                                <label for="newPwdField">Edit Password:</label>
                                <input type="password" name="newpwd" placeholder="New Password" id="newPwdField">
                                <input type="password" name="confpwd" placeholder="Confirm New Password" id="confPwdField">
                                <input type="password" name="pwd" placeholder="Enter Password" id="newPwdConfField">
                                <button id="submit-btn-pwd">Submit</button>
                            </form>
                        </div>
                        <!-- fname  -->
                        <div class="fnameContainer edit-container">
                            <form id="fname-edit-container" method="POST">
                                <input type="hidden" name="submit-btn-fname" id="hidden-fname" value="submit-btn-fname">
                                <label for="newFnameField">Edit First Name:</label>
                                <input type="text" name="newfname" placeholder="New First Name" id="newFnameField">
                                <input type="password" name="pwd" placeholder="Confirm Password" id="newPwdFnameField">
                                <button id="submit-btn-fname">Submit</button>
                            </form>
                        </div>
                        <!-- lname  -->
                        <div class="lnameContainer edit-container">
                            <form id="lname-edit-container" method="POST">
                                <input type="hidden" name="submit-btn-lname" id="hidden-lname" value="submit-btn-lname">
                                <label for="newLnameField">Edit Last Name:</label>
                                <input type="text" name="newlname" placeholder="New Last Name" id="newLnameField">
                                <input type="password" name="pwd" placeholder="Confirm Password" id="newPwdLnameField">
                                <button id="submit-btn-lname">Submit<>
                            </form>
                        </div>
                    </div>
                </div>

            </main>

        </body>

        </html>

<?php


    } else {
        echo "User not found";
    }
} else {
    echo "User id is not set or found";
}

?>