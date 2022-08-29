<?php

$post = R::load('posts', $_GET['id']);

if ( isset($_POST['postDelete'])){

    // Формирование физического пути к изображениям
    $deletePath = ROOT . "app/usercontent/blog/covers/" . $post->cover;
    $deletePathSmall = ROOT . "app/usercontent/blog/covers/" . $post->coverSmall;

    // Удаление изображения
    $deleteResult = unlink($deletePath);
    $deleteResultSmall = unlink($deletePathSmall);

    // Проверка удаления
    if(!$deleteResult && !$deletePathSmall){
        $_SESSION['errors'][] = [   'title' => 'ошибка удаления файла.'];
    } else {
        $delete = R::trash($post);
    }
    header("Location:" . HOST . "admin/blog");
}

// Буферизация вывода
ob_start();
include ROOT . 'app/admin/templates/blog/post-delete.tpl';
$content = ob_get_contents();
ob_end_clean();


include ROOT . 'app/admin/templates/template.tpl';