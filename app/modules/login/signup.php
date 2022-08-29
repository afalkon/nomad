<?php

$pageTitle = "Регистрация";
$pageClass = "authorization-page";


if (isset($_POST['signup'])){
    //Проверка на заполненность
    if (trim($_POST['email']) == '') {
        //Выводим ошибку о пустом Email
        $_SESSION['errors'][] = ['title' => 'Введите Email!', 'desc' => 'Поле Email является обязательным для заполнения.'];
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $_SESSION['errors'][] = ['title' => 'Введите корректный E-mail'];
    }
    if (trim($_POST['password']) == '') {
        //Выводим ошибку о пустом пароле
        $_SESSION['errors'][] = ['title' => 'Введите пароль!'];
    }
    if (strlen(trim($_POST['password'])) < 5 ) {
        $_SESSION['errors'][] = [   'title' => 'Пароль слишком короткий!',
                        'desc' => 'Пароль должен содержать минимально 5 знаков.'
    ];
    }
    if (R::count('users', 'email = ?', array($_POST['email'])) > 0){
        $_SESSION['errors'][] = [   'title' => 'Пользователь с таким Email уже существует',
                        'desc' => 'Используйте другой Email, или воспользуйтесь <a href="' . HOST . 'lost-password">восстановлением пароля</a>.'
    ];
    }
    if (empty($_SESSION['errors'])){
        $user = R::dispense('users');
        $user->email = $_POST['email'];
        $user->role = "user";
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $result = R::store($user);

        if (is_int($result)){
            $success[] = ['title' => 'Регистрация прошла успешно.'];

            //Автологин пользователя после регистрации
            $_SESSION['logged_user'] = $user;
            $_SESSION['login'] = 1;
            $_SESSION['role'] = $user->role;

            $_SESSION['success'][] = ['title' => 'Вы успешно зарегистрировались! Теперь можете заполнить свой профиль.']; 

            //Перенаправление на страницу редактирования профиля
            header("Location: " . HOST . "profile-edit");
            exit;

        } else {
            $_SESSION['errors'][] = [   'title' => 'Ooops... Что-то пошло не так.', 
                            'desc' => 'Повторите регистрацию позже'
        ];
        }
    }
}

ob_start();

include ROOT . 'app/templates/login/form-signup.tpl';

$content = ob_get_contents();

ob_end_clean();

require ROOT . 'app/templates/_page-parts/_head.tpl';
require ROOT . 'app/templates/login/login-page.tpl';
require ROOT . 'app/templates/_page-parts/_foot.tpl';
