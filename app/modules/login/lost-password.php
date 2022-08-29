<?php

$pageTitle = "Восстановить пароль";
$pageClass = "authorization-page";



if (isset($_POST['lost-password'])){

    $_POST['email'] = trim($_POST['email']);
    //Проверка на заполненность поля Email
    if (trim($_POST['email']) == '') {
        $_SESSION['errors'][] = ['title' => 'Введите Email!'];
    } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = ['title' => 'Введите корректный Email'];
    }

    if (empty($_SESSION['errors'])){
        //проверка на существующий Email
        $user = R::findOne('users', 'email = ?', array($_POST['email']));

        if ($user){
            //генерируем секретный код
            function random_str($num = 30){
                return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $num);
            }
            $recovery_code = random_str();

            $user->recovery_code = $recovery_code;
            R::store($user);

            // Формирование письма пользователю
            $recovery_message = "<p>Код сброса пароля: <b>$recovery_code</b></p>";
            $recovery_message .= "<p>Для сброса пароля перейдите по ссылкениже, и установите новый пароль:</p>";
            $recovery_link = HOST . "set-new-password?email={$_POST['email']}&code={$recovery_code}";
            $recovery_message .= '<p><a href="' . $recovery_link . '">Установить новый пароль</a></p>';

            $headers =  "MIME-Version: 1.0" . PHP_EOL . 
                        "Content-Type: text/html; charset=utf-8" . PHP_EOL . 
                        "From: " . "=?utf-8?B?" . base64_encode(SITE_NAME) . "?=" . "<" . SITE_EMAIL . ">" . PHP_EOL . 
                        "Reply-To: " . SITE_EMAIL . PHP_EOL;
            
            //Отправка письма пользователю
            $resultEmail = mail($_POST['email'], 'Восстановление доступа', $recovery_message, $headers);

            if ($resultEmail){
                $success[] = ['title' => 'Проверьте почту', 'desc' => '<p>Вам был отправлен Email со ссылкой для сброса пароля</p>'];
            } else {
                $_SESSION['errors'][] = ['title' => 'Что-то пошло не так', 'desc' => '<p>Попробуйте повторить процедуру сброса пароля позже</p>'];
            }
            
        } else {
            $_SESSION['errors'][] = ['title' => 'Такого пользователя не существует'];
        }
    }
}

ob_start();

include ROOT . 'app/templates/login/lost-password.tpl';

$content = ob_get_contents();

ob_end_clean();

require ROOT . 'app/templates/_page-parts/_head.tpl';
require ROOT . 'app/templates/login/login-page.tpl';
require ROOT . 'app/templates/_page-parts/_foot.tpl';