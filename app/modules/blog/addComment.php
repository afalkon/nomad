<?php

if(!empty($_SESSION['login'] && $_SESSION['login'] == 1)){
    if (isset($_POST['submit'])){

        if(empty(rtrim($_POST['comment']))){
            $_SESSION['errors'][] = ['title' => 'Поле комментария не может быть пустым.'];
        }
        if(empty($_POST['id'])){
            $_SESSION['errors'][] = ['title' => 'Ошибка получения данных об id поста.'];
        }
    
        if(empty($_SESSION['errors'])){
            $comment = R::dispense('comments');
            $comment->user = $_SESSION['logged_user']['id'];
            $comment->post = $_POST['id'];
            $comment->comment = $_POST['comment'];
            $comment->timestamp = time();
    
            $commentResult = R::store($comment);
    
            if($commentResult){
                $_SESSION['success'][] = ['title' => 'Комментарий успешно добавлен.'];
    
                header("Location:" . HOST . "blog?id=" . $_POST['id'] . '#comments');
                exit();
            } else {
                $_SESSION['errors'][] = ['title' => 'Что-то пошло не так, попробуйте позже.'];
            }
        }
        header("Location:" . HOST . "blog?id=" . $_POST['id'] . '#comments');
    }
} else {
    header("Location:" . HOST . "login");
}
