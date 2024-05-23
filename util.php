<?php
    function upload_image($file) {
        echo UPLOAD_DIR;
        $target_file = UPLOAD_DIR ."/". basename($file["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($file["image"]["tmp_name"]);
        if ($check) {
            $uploadOk = 1;
        } else {
            echo "File is not an image";
        }
    
        if (file_exists($target_file))  $uploadOk = 0;
    
        if ($file["image"]["size"] > UPLOAD_MAX_FILE_SIZE) $uploadOk = 0;
    
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType !="webp" )  $uploadOk = 0;
    
        if ($uploadOk == 1) {
            if(!file_exists(UPLOAD_DIR)) {
                if(mkdir(UPLOAD_DIR,0777)) {
                    echo "folder created";
                }
            }
            move_uploaded_file($file["image"]["tmp_name"], $target_file);
        }
        else {
            echo "there was error while uploading a file";
        }

        return $target_file;
    }