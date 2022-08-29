<?php

$pageTitle = "Вход на сайт";
$pageClass = "authorization-page";


if (isset($_POST['submit'])){
    //Проверка на заполненность поля Email
    if (trim($_POST['email']) == '') {
        $_SESSION['errors'][] = ['title' => 'Введите Email!'];
    } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = ['title' => 'Введите корректный Email'];
    }
    //Проверка на заполненность поля Password
    if (trim($_POST['password']) == '') {
        $_SESSION['errors'][] = ['title' => 'Введите пароль'];
    }
    //Если массив $errors пустой, то ищем пользователя в БД
    if (empty($_SESSION['errors'])) {
        $user = R::findOne('users', 'email = ?', array($_POST['email']));

        if ($user) {

            if (password_verify($_POST['password'], $user->password)) {

                //$success[] = ['title' => 'Добро пожаловать!'];

                //Логин пользователя в Сеиссию
                $_SESSION['logged_user'] = $user;
                $_SESSION['login'] = 1;
                $_SESSION['role'] = $user->role;

                $_SESSION['success'][] = ['title' => 'Вы успешно вошли на сайт! Мы рады снова видеть Вас!'];

                //Перенаправление на страницу редактирования профиля
                header("Location: " . HOST . "profile?id=" . $_SESSION['logged_user']['id']);
                exit;

            } else {
                $_SESSION['errors'][] = [   'title' => 'Пароль не верный',
                                'desc' => 'Если Вы забыли пароль, воспользуйтесь <a href="' . HOST . 'lost-password">восстановлением пароля</a>'
            ];
            }
            
        } else {
            $_SESSION['errors'][] = [   'title' => 'Такого пользователя не существует',
                            'desc' => 'Проверьте поле Email, или воспользуйтесь <a href="' . HOST . 'signup">регистрацией</a> нового пользователя.'
        ];
        }
    }

}

ob_start();

include ROOT . 'app/templates/login/form-login.tpl';

$content = ob_get_contents();

ob_end_clean();

require ROOT . 'app/templates/_page-parts/_head.tpl';
require ROOT . 'app/templates/login/login-page.tpl';
require ROOT . 'app/templates/_page-parts/_foot.tpl';
