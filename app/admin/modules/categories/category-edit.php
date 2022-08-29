<?php

$cat = R::load('categories', $_GET['id']);

if (isset($_POST['submit'])){

    if(empty($_POST['title'])){
        $_SESSION['errors'][] = [   'title' => 'Необходимо заполнить поле название.',
                                    'desc' => 'Это поле является обязательным.'];
    }
    
    if(empty($_SESSION['errors'])){
        $cat->title = $_POST['title'];
        
        $editResult = R::store($cat);
        if($editResult){
            $_SESSION['success'][] = [  'title' => 'Категория была успешно изменена.'];
        } else {
            $_SESSION['errors'][] = [   'title' => 'Упс... Что-то пошло не так.'];
        }
    }
}


// Буферизация вывода
ob_start();
include ROOT . 'app/admin/templates/categories/category-edit.tpl';
$content = ob_get_contents();
ob_end_clean();


include ROOT . 'app/admin/templates/template.tpl';