<?php

$messages = R::getAll('SELECT * FROM messages ORDER BY id DESC');



if(!empty($_GET['action'])){

    if($_GET['action'] === 'delete' && isset($_GET['id'])){
        $message = R::load('messages', $_GET['id']);

        // Удаляем файл, если он есть
        if(!empty($message['file_name'])){
            $filePath = ROOT . 'app/usercontent/message-files/' . $message['file_name'];
            unlink($filePath);
        }
        // Удаляем запись из БД
        $deleteResult = R::trash($message);
        if($deleteResult){
            $_SESSION['success'][] = ['title' => 'Сообщение успешно удалено!'];
        } else {
            $_SESSION['errors'][] = ['title' => 'При удалении сообщения произошла ошибка'];
        }
    }
    header("Location: " . HOST . "admin/messages");
}

if(isset($_GET['id'])){

    $message = R::load('messages', $_GET['id']);

    // Делаем письмо прочитанным
    if($message['unread'] == 1){
        $message->unread = 0;
        R::store($message);
        header("Location: " . HOST . "admin/messages?id=" . $_GET['id']);
    }

    // Определям формат прикрепленного файла
    if(!empty($message['file_name'])){
        $kaboom = explode('.', $message['file_name']);
        $imgFormats = ['png', 'gif', 'jpg', 'jpeg'];
        
        if(in_array($kaboom[1], $imgFormats)){
            $isImg = 1;
        } else {
            $isImg = 0;
        }
    }
    // Буферизация вывода одного сообщения
    ob_start();
    include ROOT . 'app/admin/templates/messages/single-message.tpl';
    $content = ob_get_contents();
    ob_end_clean();
} else {
    // Буферизация вывода всех сообщений
    ob_start();
    include ROOT . 'app/admin/templates/messages/messages.tpl';
    $content = ob_get_contents();
    ob_end_clean();
}



include ROOT . 'app/admin/templates/template.tpl';