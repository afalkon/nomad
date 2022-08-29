<?php


$post = R::load('posts', $_GET['id']);
$cats = R::find('categories', 'ORDER BY title DESC');

// Если была нажата кнопка "Удалить" на иконке изображения
if(isset($_GET['purpose']) && $_GET['purpose'] == 'deleteCover'){

    // Формирование пути для изображения
    $imagePath = ROOT . "app/usercontent/blog/covers/" . $post->cover;
    $imagePathSmall = ROOT . "app/usercontent/blog/covers/" . $post->coverSmall;
    
    // Удаление файлов с хостинга
    $deleteFull = unlink($imagePath);
    $deleteSmall = unlink($imagePathSmall);

    // Проверка физического удаление
    if (!$deleteFull || !$deleteSmall){
        $_SESSION['error'][] = [   'title' => 'Произошла ошибка.',
                                    'desc' => 'При удалении файла с хостинга произошла ошибка.'];
    } else {
        // Очистка полей в БД
        $post->cover = '';
        $post->coverSmall = '';

        // Сохранение бина
        $coverDeleteResult = R::store($post);

        // Проверка результата удаления
        if($coverDeleteResult){
            $_SESSION['success'][] = [  'title' => 'Удаление изображения прошло успешно.', 
                                        'desc' => 'Можете загрузить новое изображение для поста.'];
        } else {
            $_SESSION['error'][] = [   'title' => 'Ошибка обновления бина.', 
                                        'desc' => 'Удаление изображения прервалось на стадии сохранения бина.'];
        }

    }
    // Перенаправление обратно на страницу редактирования поста
    header("Location: " . HOST . "admin/post-edit?id=" . $post->id);
}

if (isset($_POST['postEdit'])){

    if(empty($_POST['title'])){
        $_SESSION['errors'][] = [   'title' => 'Необходимо заполнить поле название.',
                                    'desc' => 'Это поле является обязательным.'];
    }
    if(empty($_POST['content'])){
        $_SESSION['errors'][] = [   'title' => 'Необходимо заполнить поле содержимое.',
                                    'desc' => 'Это поле является обязательным.'];
    }
    

    if(empty($_SESSION['errors'])){
        $post->title = $_POST['title'];
        $post->cat = $_POST['cat'];
        $post->content = $_POST['content'];
        $post->editTime = time();

        // Блок загрузки изображения
        
        $uploadedImg = saveUploadedImg('cover', [600, 300], 12, 'blog/covers', [1100, 460], [290, 230], $post->cover, $post->cover_small);

        if (!empty($uploadedImg)){
            $post->cover = $uploadedImg[0];
            $post->coverSmall = $uploadedImg[1];
        }
        
        $editResult = R::store($post);
        if($editResult){
            $_SESSION['success'][] = [  'title' => 'Успех!',
                                        'desc' => 'Измененный пост успешно сохранён.'];
        } else {
            $_SESSION['errors'][] = [   'title' => 'Упс... Что-то пошло не так.',
                                        'desc' => 'При попытке сохранения нового бина произошла ошибка.'];
        }
    }
}

// Буферизация вывода
ob_start();
include ROOT . 'app/admin/templates/blog/post-edit.tpl';
$content = ob_get_contents();
ob_end_clean();


include ROOT . 'app/admin/templates/template.tpl';