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

// Получение комментариев пользователя
$sqlQueryComments = 'SELECT comments.comment, comments.user, comments.timestamp,
                            users.name, users.surname, users.avatarsmall
                    FROM `comments` LEFT JOIN `users` ON comments.user = users.id
                    WHERE comments.post = ?';
$comments = R::getALL($sqlQueryComments, [$post['id']]);

$commentsNum = count($comments);
$lastNum = substr($commentsNum, -1);

// Получение поъожих постов по категории с исключением записи текущего поста
$sqlQuerySimilarPosts = 'SELECT posts.title, posts.cover_small, posts.id
                            FROM `posts`
                            WHERE posts.cat = ?
                            AND posts.id NOT IN (' . $post['id'] . ')
                            ORDER BY RAND()';

$similarPosts = R::getALL($sqlQuerySimilarPosts, [$post['cat']]);

/* print_r($similarPosts);
die(); */


// Буферизация вывода
ob_start();
include ROOT . 'app/templates/blog/post.tpl';
$content = ob_get_contents();
ob_end_clean();