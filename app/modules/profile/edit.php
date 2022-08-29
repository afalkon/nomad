<?php

require_once ROOT . "app/libs/functions.php";

$inputDisplay = array();

/* Recording ID of ideted user to session */
if (isset($_GET['id'])){
$_SESSION['edited_user']['id'] = $_GET['id'];
}

/* input display function */
function inputdisplay($errors, $user){
    if (!empty($errors)){
        $inputDisplay['name'] = $_POST['name'];
        $inputDisplay['surname'] = $_POST['surname'];
        $inputDisplay['email'] = $_POST['email'];
        $inputDisplay['country'] = $_POST['country'];
        $inputDisplay['city'] = $_POST['city'];
    } elseif (empty($errors)) {
        $inputDisplay['name'] = $user->name;
        $inputDisplay['surname'] = $user->surname;
        $inputDisplay['email'] = $user->email;
        $inputDisplay['country'] = $user->country;
        $inputDisplay['city'] = $user->city;
    }
    return $inputDisplay;
}

/* Profile editation for Admin and User  */
if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {
    /* For Admin every user profile is editable */
    if ($_SESSION['logged_user']['role'] === 'admin'){
        $user = R::load('users', $_SESSION['edited_user']['id']);
        
        $inputDisplay['name'] = $user->name;
        $inputDisplay['surname'] = $user->surname;
        $inputDisplay['email'] = $user->email;
        $inputDisplay['country'] = $user->country;
        $inputDisplay['city'] = $user->city;

        /* Avatar upload */
        if(!empty($_FILES)){
            $uploadedImg = saveUploadedImg('avatar', [160, 160], 4, 'avatars', [160, 160], [48, 48], $user->avatar, $user->avatarsmall);
        
            if (!empty($uploadedImg)){
                $user->avatar = $uploadedImg[0];
                $user->avatarsmall = $uploadedImg[1];
            }
        }

        if (isset($_POST['updateProfile'])) {

            //Проверка полей на заполненность
            if (trim($_POST['name']) === ''){
                $_SESSION['errors'][] = ['title' => 'Введите имя пользователя'];
            }
            if (trim($_POST['surname']) === ''){
                $_SESSION['errors'][] = ['title' => 'Введите фамилию пользователя'];
            }
            if (trim($_POST['email']) === ''){
                $_SESSION['errors'][] = ['title' => 'Введите Email'];
            }

            $inputDisplay = inputdisplay($_SESSION['errors'], $user);

            //Если ошибок нет - добавляем информацию в БД
            if (empty($_SESSION['errors'])){
                $user->name = htmlentities($_POST['name']);
                $user->surname = htmlentities($_POST['surname']);
                $user->email = htmlentities($_POST['email']);
                $user->country = htmlentities($_POST['country']);
                $user->city = htmlentities($_POST['city']);

                // Удаление аватара пользователя
                if ( isset($_POST['deleteAvatar']) && $_POST['deleteAvatar'] == 'on'){

                    $userAvatarLoc = ROOT . "app/usercontent/avatars/";
                    unlink($userAvatarLoc . $user->avatar);
                    unlink($userAvatarLoc . "48-" . $user->avatar);

                    $user->avatar = '';
                    $user->avatarsmall = '';

                }

                R::store($user);
                header("Location: " . HOST . "profile?id=" . $_SESSION['edited_user']['id']);
                exit();
            }
        }

    /* For User only his profile can be editable */
    } elseif ($_SESSION['logged_user']['role'] === 'user') {
        $user = R::load('users', $_SESSION['logged_user']['id']);

        $inputDisplay['name'] = $user->name;
        $inputDisplay['surname'] = $user->surname;
        $inputDisplay['email'] = $user->email;
        $inputDisplay['country'] = $user->country;
        $inputDisplay['city'] = $user->city;

        /* Avatar upload */
        if(!empty($_FILES)){
            $uploadedImg = saveUploadedImg('avatar', [160, 160], 4, 'avatars', [160, 160], [48, 48], $user->avatar, $user->avatarsmall);
        
            if (!empty($uploadedImg)){
                $user->avatar = $uploadedImg[0];
                $user->avatarsmall = $uploadedImg[1];
            }
        }

        if (isset($_POST['updateProfile'])) {

            //Проверка полей на заполненность
            if (trim($_POST['name']) === ''){
                $_SESSION['errors'][] = ['title' => 'Введите имя пользователя'];
            }
            if (trim($_POST['surname']) === ''){
                $_SESSION['errors'][] = ['title' => 'Введите фамилию пользователя'];
            }
            if (trim($_POST['email']) === ''){
                $_SESSION['errors'][] = ['title' => 'Введите Email'];
            }

            $inputDisplay = inputdisplay($_SESSION['errors'], $user);

            //Если ошибок нет - добавляем информацию в БД
            if (empty($_SESSION['errors'])){
                $user->name = htmlentities($_POST['name']);
                $user->surname = htmlentities($_POST['surname']);
                $user->email = htmlentities($_POST['email']);
                $user->country = htmlentities($_POST['country']);
                $user->city = htmlentities($_POST['city']);

                // Удаление аватара пользователя
                if ( isset($_POST['deleteAvatar']) && $_POST['deleteAvatar'] == 'on'){

                    $userAvatarLoc = ROOT . "app/usercontent/avatars/";
                    unlink($userAvatarLoc . $user->avatar);
                    unlink($userAvatarLoc . "48-" . $user->avatar);

                    $user->avatar = '';
                    $user->avatarsmall = '';

                }

                R::store($user);
                $_SESSION['logged_user'] = $user;
                header("Location: " . HOST . "profile?id=" . $_SESSION['logged_user']['id']);
                exit();
            }
        }
    }
} else {
    header("Location: " . HOST . "login");
}

$pageTitle = "Редактирование профиля";

/* ob_start();

include ROOT . 'templates/login/form-login.tpl';

$content = ob_get_contents();

ob_end_clean(); */

require ROOT . 'app/templates/_page-parts/_head.tpl';
require ROOT . 'app/templates/_parts/_header.html';
require ROOT . 'app/templates/profile/profile-edit.tpl';
require ROOT . 'app/templates/_parts/_footer.html';
require ROOT . 'app/templates/_page-parts/_foot.tpl';