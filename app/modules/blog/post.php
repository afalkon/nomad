<?php

$post = R::load('posts', $_GET['id']);

// Проверка поля $post['cat'] на заполненность в БД
if(!empty($post['cat'])){
    $cat = R::load('categories', $post['cat']);
}

// Блок навигации на странице поста
$idArr = R::getCol('SELECT id FROM posts');

foreach($idArr as $index => $value){
    if($_GET['id'] == $value){
        $prevId = array_key_exists($index - 1, $idArr) ? $idArr[$index - 1] : null;
        $nextId = array_key_exists($index + 1, $idArr) ? $idArr[$index + 1] : null;
    }
}


// Буферизация вывода
ob_start();
include ROOT . 'app/templates/blog/post.tpl';
$content = ob_get_contents();
ob_end_clean();