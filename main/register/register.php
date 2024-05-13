<?php 
    
    require_once("../../load_env.php");
    require_once("../db_conn.php");
   
    session_start();
 
     if (isset($_POST['submit_frm'])) {
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                $siteKeyV2 = $_ENV['CAPTCHA_SITE_KEY_V2'];
                $secretKeyV2 = $_ENV['CAPTCHA_SECRET_KEY_V2'];
                $serverIp = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKeyV2 . "&response=". $_POST['g-recaptcha-response'];
                $request = file_get_contents($url);
                $response = json_decode($request);
                if($response->success) {
                        $userEmail = htmlspecialchars($_POST['email']);
                        $userPassword = htmlspecialchars($_POST['password']);
                        $userFName = htmlspecialchars($_POST['fname']);
                        $userLName = htmlspecialchars($_POST['lname']);
                        $userGender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
                        $selectionSql = "SELECT * FROM user WHERE useremail = '$userEmail' AND userpassword = '$userPassword'";
                        $result = mysqli_query($conn, $selectionSql);
                
                        if(mysqli_num_rows($result) > 0) {
                            echo "User is already registered";
                        } else {
                            $dateRegistration = date("Y-m-d");
                            $userEmail = $_POST['email'];
                            $userPassword = $_POST['password'];
                            $insertionSql = "INSERT INTO user(useremail, userpassword, flagptindicator, dateregistration, fname, lname, gender, usercategory) VALUES('$userEmail', '$userPassword', '1', '$dateRegistration', '$userFName', '$userLName', '$userGender', 'user')";
                            mysqli_query($conn, $insertionSql);
                            echo 'alert("Successfully Signed Up")';
                            header("Location: ../login/");
                            $conn->close();
                        }
                } else {
                    echo "Validation Failed";
                }
            } else {
                echo "Recaptcha Error";
            }
        } else {
            echo "Empty Input";
        }
       
      
     } else {
        echo "Invalid";
     }
          


?>