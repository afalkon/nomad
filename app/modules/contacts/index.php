<?php

$pageTitle = "Контакты";

require ROOT . 'app/libs/functions.php';

$values = R::load('contacts', 1);

if (isset($_POST['submit'])){
    $newMessage = R::dispense('messages');

    if(empty(rtrim($_POST['name']))){
        $_SESSION['errors'][] = ['title' => 'Введите своё имя.'];
    }
    if(empty(rtrim($_POST['email']))){
        $_SESSION['errors'][] = ['title' => 'Введите Ваш Email.'];
    }
    if(empty(rtrim($_POST['message']))){
        $_SESSION['errors'][] = ['title' => 'Введите сообщение'];
    }

    $newMessage->name = rtrim($_POST['name']);
    $newMessage->email = rtrim($_POST['email']);
    $newMessage->message = rtrim($_POST['message']);

    if(!empty($_FILES['uploadedFile']['name'])){
        $newMessage->file_name = saveUploadedFile('uploadedFile', 'message-files');
    }

    // Статус непрочтённого письма: 1 - не прочтенное, 0 - прочтённое
    $newMessage->unread = 1;
    $newMessage->timestamp = time();

    if(empty($_SESSION['errors'])){
        $messageResult = R::store($newMessage);
        if($messageResult){
            $_SESSION['success'][] = [  'title' => 'Ваше сообщение успешно отправлено!',
                                        'desc' => 'Мы постараемся ответить как можно скорее!'];
        } else {
            $_SESSION['errors'][] = [   'title' => 'Что-то пошло не так...',
                                        'desc' => 'Попробуйте позже, или обратитесь к администратору.'];
        }
    }

    

}
/* 
print_r($_FILES);
die(); */

require ROOT . 'app/templates/_page-parts/_head.tpl';
require ROOT . 'app/templates/_parts/_header.html';
require ROOT . 'app/templates/contacts/contacts.tpl';
require ROOT . 'app/templates/_parts/_footer.html';
require ROOT . 'app/templates/_page-parts/_foot.tpl';