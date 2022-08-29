<?php

$pageTitle = "Установить новый пароль";
$pageClass = "authorization-page";


if (!empty($_GET['email']) && !empty($_GET['code'])){
    $user = R::findOne('users', 'email = ?', array($_GET['email']));

    if (!$user){
        header("Location:" . HOST . "app/lost-password");
    }
} else if (!empty($_POST['set-new-password'])){
    $user = R::findOne('users', 'email = ?', array($_POST['email']));

    if ($user){
        //Если пользователь найден, проверяем секретный код на верность

        if ($user->recovery_code === $_POST['resetCode'] && $user->recovery_code != '' && $user->recovery_code != NULL){
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->recovery_code = '';
            R::store($user);

            $success[] = ['title' => 'Пароль успешно обновлён'];
            //Флаг для отключения поля с вводом нового пароля и кнопки
            $newPasswordReady = true;
        } else {
            $_SESSION['errors'][] = ['title' => 'Неверный код для сброса пароля'];
        }
    }
} else {
    header("Location: " . HOST . "app/lost-password");
    die();
}



ob_start();

include ROOT . 'app/templates/login/set-new-password.tpl';

$content = ob_get_contents();

ob_end_clean();

require ROOT . 'app/templates/_page-parts/_head.tpl';
require ROOT . 'app/templates/login/login-page.tpl';
require ROOT . 'app/templates/_page-parts/_foot.tpl';