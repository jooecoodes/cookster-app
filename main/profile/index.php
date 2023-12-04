<?php 
    session_start();

    if(isset($_SESSION['userId'])) {
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

            
        </body>
        </html>

<?php 
        
    } else {
        include "../logged_out.php";    
        echo "logged out";
    }

?>
