<?php 
     session_start();
    require_once("../../load_env.php");
    require_once("../db_conn.php");
     if (isset($_POST['submit_frm'])) {
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

                $siteKeyV3 = $_ENV['CAPTCHA_SITE_KEY_V3'];
                $secretKeyV3 = $_ENV['CAPTCHA_SECRET_KEY_V3'];
                $serverIp = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKeyV3 . "&response=". $_POST['g-recaptcha-response'];
                $request = file_get_contents($url);
                $response = json_decode($request);
                var_dump($response);
                if($response->success) {
                    $userEmail = $_POST['email'];
                    $userPassword = $_POST['password'];
                    $selectionSql = "SELECT * FROM user WHERE useremail = '$userEmail' AND userpassword = '$userPassword'";
                    $result = mysqli_query($conn, $selectionSql);
                    
                    if(mysqli_num_rows($result) > 0) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                            $token = bin2hex(random_bytes(16)); // Generate a random 32-character token
                            // Store the token in a cookie that expires in a specified time (e.g., 30 days).
                            setcookie('remember_me', $token, time() + (30 * 24 * 60 * 60), '/');
            
                            // Token Storation
                            $sql = "UPDATE user SET token = '$token' WHERE id = " . $rows['id'];
                            mysqli_query($conn, $sql);
            
                            // set sessions for the user
                            $_SESSION['userId'] = $rows["id"];
                            $_SESSION['userFlagPtIndicator'] = $rows["flagptindicator"];
                            $_SESSION['userGender'] = $rows['gender'];
                            $_SESSION['userprofile'] = $rows['userprofile'];
                            $_SESSION['usercategory'] = $rows['usercategory'];
                            $_SESSION['userFname'] = $rows['fname'];
                            $_SESSION['userLname'] = $rows['lname'];
                            $_SESSION['userPoints'] = $rows['points'];
                            
                            header("Location: ../profile/");
                        }
                        $conn->close();
                    } else {
                        echo "Login or password is invalid";
                        
           
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