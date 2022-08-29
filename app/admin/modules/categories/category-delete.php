<?php

$cat = R::load('categories', $_GET['id']);

if ( isset($_POST['submit'])){
    $deleteResult = R::trash($cat);
    if ($deleteResult){
        $_SESSION['success'][] = ['title' => 'Категория успешно удалена'];
        header("Location:" . HOST . "admin/categories");
    } else {
        $_SESSION['errors'][] = ['title' => 'Упс... Что-то пошло не так.'];
    }
}

// Буферизация вывода
ob_start();
include ROOT . 'app/admin/templates/categories/category-delete.tpl';
$content = ob_get_contents();
ob_end_clean();


include ROOT . 'app/admin/templates/template.tpl';