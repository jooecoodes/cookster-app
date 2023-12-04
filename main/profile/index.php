<?php 
    session_start();

    if(isset($_SESSION['userId'])) {
        if(isset($_GET['edit'])) {
            include '../db_conn.php';

            if(isset($_SESSION['userId'])){
                $userId = $_SESSION['userId'];
                $selectionSql = "SELECT * FROM user WHERE id = $userId";
                $result = mysqli_query($conn, $selectionSql);
                
                if(mysqli_num_rows($result) > 0) {
                    $userUsername = '';
                    $userProfile = '';
                    $userPassword = '';
                    $userFName = '';
                    $userLName = '';
                    $userGender = '';
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
                        <title>Document</title>
                    </head>
                    <body>
                        <p>Username: <?php echo $userUsername ?></p>
                        <button id="editUnameBttn">Edit</button>
                        <p>User Profile: <?php echo $userProfile ?></p>
                        <button id="editProfileBttn">Edit</button>
                        <p>User Password: <?php echo $userPassword ?></p>
                        <button id="editPwdBttn">Edit</button>
                        <p>User Fname: <?php echo $userFName ?></p>
                        <button id="editFnameBttn">Edit</button>
                        <p>User Lname: <?php echo $userLName ?></p>
                        <button id="editLnameBttn">Edit</button>
                        
                        <div class="unameContainer">
                            <form>
                                <input type="text" name="uname" placeholder="Edit Username" id="unameField">
                                <input type="password" name="pwd" placeholder="Enter Password" id="pwdField">
                            </form>
                        </div>
                        <div class="pfpContainer">
                             <form>
                                <!-- <input type="text" name="uname" placeholder="Edit Username" id="unameField">
                                <input type="password" name="pwd" placeholder="Enter Password" id="pwdField"> -->
                                test
                            </form>
                        </div>
                        <div class="pwdContainer">
                            <form>
                                <input type="text" name="newpwd" placeholder="New Password" id="newPwdField">
                                <input type="text" name="confpwd" placeholder="Confirm Password" id="newPwdField">
                                <input type="password" name="pwd" placeholder="Enter Password" id="pwdField">
                            </form>
                        </div>
                        <div class="fnameContainer">
                            <form>
                                <input type="text" name="newfname" placeholder="New Password" id="newPwdField">
                                <input type="text" name="uname" placeholder="Confirm Password" id="newPwdField">
                            </form>
                        </div>
                        <div class="lnameContainer">
                            <form>
                                <input type="text" name="newlname" placeholder="New Password" id="newPwdField">
                                <input type="text" name="pwds" placeholder="Confirm Password" id="newPwdField">
                            </form>
                        </div>
                        
                    </body>
                    </html>
                
                    <?php
                    
                    
                } else {
                    echo "User not found";
                }
           
    
           
            } else { 
            echo "User id is not set or found";
        
            }
        } else {
            $userId =  $_SESSION['userId'];
            $userProfilePath = (empty($_SESSION['userprofile'])) ? '' : $_SESSION['userprofile'];
            $profileBlankFlag = (empty($userProfilePath)) ? true : false;
            $userProfile;
            $userGender = (empty($_SESSION['userGender'])) ?  '' : $_SESSION['userGender'];
            print_r($userGender);
            if($profileBlankFlag) {
                if(empty($userGender)) {
                    $userProfile = 'default-question-profile.png';
                }
                if($userGender == "male") {
                    $userProfile = 'default-male-profile.jpg';
                } 
                if ($userGender == 'female') {
                    $userProfile = 'default-female-profile.jpg';
                } 
            } else {
                $userProfile = $userProfilePath;
            }

            //html part profile 
             ?> 

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                <script src="profile.js"></script>
                <title>Document</title>
            </head>
            <body>
                <p>Hello, This is the profile page</p>
                <img src="<?php echo "../../assets/profile/" . $userProfile ?>" alt="profile">
                <form id="uploadForm" enctype="multipart/form-data" method="POST">
                    <input type="file" name="profile" id="profile">
                    <button type="submit" name="submit">Submit</button>
                </form>
                <h1>Badges:</h1>
                <div id="displayBadges">
                    
                </div>
                

                <button id="badgeBttn">Retrieve Badges</button>
                <button id="logoutBttn">Log out</button>
                <button id="editBttn">Edit Profile </button>

                
            </body>
            </html>

    <?php 
            
            } 
        } else {
            include "../logged_out.php";    
            echo "logged out";
        }
        

?>
