<?php 

    if(isset($_POST)) {
        $file = $_FILES['profile'];
        $dirPath = "../../assets/profile/";
        $allowedExt = ["jpeg", "jpg", "png"];
        
        echo json_encode($file);

        // if(in_array(strtolower($_FILES['type']), $allowedExt)) {
        //     print_r($file);
        // } else {
        //     echo "file not supported";
        // }
    }



?>