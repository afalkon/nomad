<?php

$postsNum = R::count('posts');
$pagination = pagination(6, $postsNum);
$posts = R::find('posts', "ORDER BY id DESC {$pagination['sqlPageLimit']}");



// Буферизация вывода
ob_start();
include ROOT . 'app/templates/blog/all-posts.tpl';
$content = ob_get_contents();
ob_end_clean();