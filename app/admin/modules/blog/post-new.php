<?php

$cats = R::find('categories', 'ORDER BY title ASC');

if ( isset($_POST['submit'])){
    if ( $_POST['title'] == ''){
        $_SESSION['errors'][] = ['title' => 'Введите заголовок поста'];
    }
    if ( $_POST['content'] == ''){
        $_SESSION['errors'][] = ['title' => 'Введите содержимое поста'];
    }

    if ( empty($_SESSION['errors'])){
        $post = R::dispense('posts');
        $post->title = $_POST['title'];
        $post->content = $_POST['content'];
        $post->cat = $_POST['cat'];
        $post->timestamp = time();

        // Блок загрузки изображения
        if (!empty($_FILES)){
            $uploadedImg = saveUploadedImg('cover', [600, 300], 12, 'blog/covers', [1100, 460], [290, 230], $post->cover, $post->coverSmall);

        $post->cover = $uploadedImg[0];
        $post->coverSmall = $uploadedImg[1];
        }
        

        $storeResult = R::store($post);
        if ($storeResult) {
            $_SESSION['success'][] = ['title' => 'Ваш пост успешно добавлен!'];
        }
        
        header("Location: " . HOST . 'admin/blog');
        exit();
    }
}

// Буферизация вывода
ob_start();
include ROOT . 'app/admin/templates/blog/post-new.tpl';
$content = ob_get_contents();
ob_end_clean();


include ROOT . 'app/admin/templates/template.tpl';