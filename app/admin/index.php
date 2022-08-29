<?php
require_once "./../../config.php";
require_once ROOT . "db.php";

require_once ROOT . "app/libs/resize-and-crop.php";
require_once ROOT . "app/libs/functions.php";


$_SESSION['errors'] = array();
$_SESSION['success'] = array(); 

// Start of session
session_start();

if ( !(isset($_SESSION['logged_user']['role']) && $_SESSION['logged_user']['role'] === 'admin')){
    header("Location: " . HOST . "login");
    exit();
}

$uriArr = explodeGet();
$uriModule = uriModule($uriArr);

switch ($uriModule){
    case 'admin':
        require ROOT . 'app/admin/modules/admin/index.php';
        break;

    // :::::::::::::::::: Blog ::::::::::::::::::
    case 'admin/blog':
        require ROOT . 'app/admin/modules/blog/index.php';
        break;
    case 'admin/post-new':
        require ROOT . 'app/admin/modules/blog/post-new.php';
        break;
    case 'admin/post-edit':
        require ROOT . 'app/admin/modules/blog/post-edit.php';
        break;
    case 'admin/post-delete':
        require ROOT . 'app/admin/modules/blog/post-delete.php';
        break;

    // :::::::::::::::::: Categories ::::::::::::::::::
    case 'admin/categories':
        require ROOT . 'app/admin/modules/categories/categories.php';
        break;
    case 'admin/category-new':
        require ROOT . 'app/admin/modules/categories/category-new.php';
        break;
    case 'admin/category-edit':
        require ROOT . 'app/admin/modules/categories/category-edit.php';
        break;
    case 'admin/category-delete':
        require ROOT . 'app/admin/modules/categories/category-delete.php';
        break;

    // :::::::::::::::::: Default ::::::::::::::::::
    default:
        require ROOT . 'app/admin/modules/admin/index.php';
        break;
}


?>