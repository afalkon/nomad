<?php

if ( isset($_POST['submit'])){
    if ( $_POST['title'] == ''){
        $_SESSION['errors'][] = ['title' => 'Введите заголовок поста'];
    }

    if ( empty($_SESSION['errors'])){
        $cat = R::dispense('categories');
        $cat->title = $_POST['title'];
        

        $storeResult = R::store($cat);
        if ($storeResult) {
            $_SESSION['success'][] = ['title' => 'Категория успешно добавлена!'];
        }
        
        header("Location: " . HOST . 'admin/categories');
        exit();
    }
}

// Буферизация вывода
ob_start();
include ROOT . 'app/admin/templates/categories/category-new.tpl';
$content = ob_get_contents();
ob_end_clean();


include ROOT . 'app/admin/templates/template.tpl';