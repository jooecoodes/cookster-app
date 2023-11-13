<?php 
  
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "mathwiz_database";

    $conn = mysqli_connect($host, $username, $password, $database);
   
    session_start();


    if (isset($_POST)) {
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

                $_SESSION['userId'] = $rows["id"];
                $_SESSION['userFlagPtIndicator'] = $rows["flagptindicator"];
                $_SESSION['userislogged'] = true;

               
                echo "User login successfully";

                
            }
            $conn->close();
        } else {
            echo "Login or password is invalid";

        }
    }


?>