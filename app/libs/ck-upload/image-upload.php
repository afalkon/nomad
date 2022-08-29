<?php

require './../../libs/resize.php';


        /* Cover upload */
        if (isset($_FILES['upload']['name']) && $_FILES['upload']['tmp_name'] != ''){
            $fileName =     $_FILES['upload']['name'];
            $fileTmpLoc =   $_FILES['upload']['tmp_name'];
            $fileType =     $_FILES['upload']['type'];
            $fileSize =     $_FILES['upload']['size'];
            $fileErrMsg =   $_FILES['upload']['error'];

            $kaboom = explode(".", $fileName);
            $fileExt = end($kaboom);


            list($width, $height) = getimagesize($fileTmpLoc);
            if ($width < 1 || $height < 1){
                $message = 'Разрешение загружаемой фотографии слишком мало.';
            }
            if ($fileSize > 12582912){
                $message = 'Размер загружаемой фотографии слишком большой.';
            }
            if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)){
                $message = 'Неверный формат файла.';
            }
            if ($fileErrMsg == 1) {
                $message = 'При загрузке фотографии произошла ошибка. Попробуйте позже.';
            }

            if (empty($_SESSION['errors'])){
            
                
                /* Deleting of old avatar */
                
                $coverFolderLoc = ROOT . "app/usercontent/editor-uploads/";

                /* Generating name for file and upload */
                $dbFileName = rand(1000000, 9999999) . "." . $fileExt;
                $uploadFile = $coverFolderLoc . $dbFileName;
                //$moveResult = move_uploaded_file($fileTmpLoc, $uploadFile);

                if ( $width > 920 || $height > 920){
                    $result = resize($fileTmpLoc, $uploadFile, 920);
                    if ($result != true) {
                        $message = 'Ошибка сохранения файла при масштабировании';
                        return false;
                    }
                } else {
                    $result = move_uploaded_file($fileTmpLoc, $uploadFile);
                    if ($result != true) {
                        $message = 'Ошибка сохранения файла';
                        return false;
                    }
                }

                
                
                $url = HOST . 'app/usercontent/editor-uploads/' . $dbFileName;
                $message = 'Файл был успешно загружен!';
                
            }
           
        }