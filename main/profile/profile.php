<?php 
 include "../db_conn.php";
 
    session_start();
    if(isset($_GET['edit'])) {
        
    }
    if(isset($_POST)) {
        if(isset($_FILES['profile'])){
            $file = $_FILES['profile'];
            $fileName = $_FILES['profile']['name'];
            $fileTmpName = $_FILES['profile']['tmp_name'];
            $fileSize = $_FILES['profile']['size'];
            $fileError = $_FILES['profile']['error'];
            $fileType = $_FILES['profile']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $_SESSION['file_ext'] = $fileActualExt;
            $userId = $_SESSION['userId'];
            $allowedExt = ["jpeg", "jpg", "png"];
            static $counter = 0;
    
            if(in_array($fileActualExt, $allowedExt)){
                 if($fileError == 0) {
                    if($fileSize < 10485760) {
                       
                        $fileNameNew = "user=" . $_SESSION['userId'] . "." . $fileActualExt;
                        $fileDirPath = "../../assets/profile/" . $fileNameNew;
                        foreach ($allowedExt as $extension) {
                            $fullPath = $fileDirPath . '.' . $extension;
                        
                            if (file_exists($fullPath)) {
                                if (unlink($fullPath)) {
                                    echo "File deleted successfully.";
                                } else {
                                    echo "Error deleting file.";
                                }
                        
                                break; 
                            }
                        }
                        $insertionSql = "UPDATE user SET userprofile = '$fileNameNew' WHERE id ='$userId'";
                        $_SESSION['userprofile'] = $fileNameNew;
                        
                        if (mysqli_query($conn, $insertionSql)) {
                            echo "Successfully inserted user profile image data";
                        } else {
                            echo "Failed to insert user's profile data";
                        }
                        move_uploaded_file($fileTmpName, $fileDirPath);
                        echo "Successfully moved file";
                        
                        $counter++;
                    } else {
                        echo "File is too big";
                    }
                 } else {
                    echo "There was an error uploading the file";
                 }
            } else {
                echo "File is not supported";
            }
        } 
    }

    echo "Hello";

?>