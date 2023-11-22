<?php 
    session_start();

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
            $allowedExt = ["jpeg", "jpg", "png"];
            static $counter = 0;
    
            if(in_array($fileActualExt, $allowedExt)){
                 if($fileError == 0) {
                    if($fileSize < 10485760) {

                        $fileNameNew = (!isset($_SESSION['userId'])) ? uniqid('', true) . "{$counter}." . $fileActualExt : $_SESSION['userId'] . "." . $fileActualExt;
                        $fileDirPath = "../../assets/profile/user=" . $fileNameNew;
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