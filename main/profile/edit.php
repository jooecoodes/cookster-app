<?php 
    include '../db_conn.php';

    session_start();
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
                <p>User Profile: <?php echo $userProfile ?></p>
                <p>User Password: <?php echo $userPassword ?></p>
                <p>User Fname: <?php echo $userFName ?></p>
                <p>User Lname: <?php echo $userLName ?></p>
                
            </body>
            </html>
            <?php
            
            
             
        } else {
            echo "User not found";
        }
       

       
    } else { 
        include '../logged_out.php';

    }

?>
