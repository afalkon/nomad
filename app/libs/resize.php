<?php

function resize($source_image_path, $thumbnail_image_path, $resize){


    // Проверка на существование исходного файла
    if (!file_exists($source_image_path)) {
        return false;
    }

    if (!getimagesize($source_image_path)) {
        return false;
    }

    $source_path = $source_image_path;


    // Создание виртуальной копии изображения
    list($source_width, $source_height, $source_type) = getimagesize($source_path);

    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gdim = imagecreatefromgif($source_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gdim = imagecreatefromjpeg($source_path);
            break;
        case IMAGETYPE_PNG:
            $source_gdim = imagecreatefrompng($source_path);
            break;
    }

    // Высчитываем размер результирующего изображения
    //
    // Определяем, что больше. Ширина или высота
    if ( $source_width > $source_height){
        $result_width = $resize;
        $result_height = $resize / $source_width * $source_height;
    } else {
        $result_height = $resize;
        $result_width = $resize / $source_height * $source_width;
    }


    // Изменение размера картинки
    $temp_gdim = imagecreatetruecolor($result_width, $result_height);
    imagecopyresampled(
        $temp_gdim,
        $source_gdim,
        0,
        0,
        0,
        0,
        $result_width,
        $result_height,
        $source_width,
        $source_height
    );

    // Сохранение изобпажения и удаление временного файла
    imagejpeg($temp_gdim, $thumbnail_image_path, 90);
    imagedestroy($source_gdim);
    imagedestroy($temp_gdim);
    return true;
}
