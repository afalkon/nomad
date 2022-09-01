<?php

$pageTitle = "Профиль пользователя";

require ROOT . 'app/libs/functions.php';


if (isset($_GET['id'])){
    $user = R::load('users', $_GET['id']);
}


// Finding user's comments and posts

$sqlQuery = 'SELECT
                comments.id, comments.comment, comments.post, comments.user, comments.timestamp, 
                posts.title
            FROM `comments` LEFT JOIN `posts` on comments.post = posts.id
            WHERE comments.user = ?';
$comments = R::getAll($sqlQuery, [$_GET['id']]);


//Показ профилья незалогиненному пользователю

    if (!isset($_SESSION['logged_user'])){
        $isUserLogged = false;
    } else {
        $isUserLogged = true;
    }


/* echo "<pre>";
print_r($_SESSION['logged_user']);
echo "</pre>"; */


require ROOT . 'app/templates/_page-parts/_head.tpl';
require ROOT . 'app/templates/_parts/_header.html';
require ROOT . 'app/templates/profile/profile.tpl';
require ROOT . 'app/templates/_parts/_footer.html';
require ROOT . 'app/templates/_page-parts/_foot.tpl';