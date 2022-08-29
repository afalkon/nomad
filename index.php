<?php
require_once "config.php";
require_once "db.php";

require_once "./app/libs/resize-and-crop.php";


$_SESSION['errors'] = array();
$_SESSION['success'] = array();

// Start of session
session_start();

$uri = $_SERVER['REQUEST_URI'];
$uriArr = explode('?', $uri);
$uri = $uriArr[0];
$uri = rtrim($uri, "/"); // 'site.ru/' => 'site.ru'
$uri = substr($uri, 1);
$uri = filter_var($uri, FILTER_SANITIZE_URL);

$uriModuleArr = explode('/', $uri);
if(isset($uriModuleArr[1])){
    $uriModule = $uriModuleArr[0] . "/" . $uriModuleArr[1];
} else {
    $uriModule = $uriModuleArr[0];
}



//Ошибка с добавлением единицы после массива $_SERVER
/* 
$uriGet = isset($uri[1]) ? $uri[1] : null;
$uriArray = explode('/', $uri[0]);
$uriModule = $uriArray[0]; */


switch ($uriModule){
    case '':
        require ROOT . 'app/modules/main/index.php';
        break;
    // Start of User cases

    case 'login':
        require ROOT . 'app/modules/login/login.php';
        break;
    case 'signup':
        require ROOT . 'app/modules/login/signup.php';
        break;
    case 'logout':
        require ROOT . 'app/modules/login/logout.php';
        break;
    case 'lost-password':
        require ROOT . 'app/modules/login/lost-password.php';
        break;
    case 'set-new-password':
        require ROOT . 'app/modules/login/set-new-password.php';
        break;
    case 'profile';
        require ROOT . 'app/modules/profile/index.php';
        break;
    case 'profile-edit';
        require ROOT . 'app/modules/profile/edit.php';
        break;
        
    // End of User cases
    case 'about':
        require ROOT . 'app/modules/about/index.php';
        break;
    case 'blog':
        require ROOT . 'app/modules/blog/index.php';
        break;
    case 'addComment':
        require ROOT . 'app/modules/blog/addComment.php';
        break;
    case 'contacts':
        require ROOT . 'app/modules/contacts/index.php';
        break;
    default:
    require ROOT . 'app/modules/main/index.php';
        break;
}


?>