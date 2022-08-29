<?php

$posts = R::find('posts', 'ORDER BY id DESC');

// Буферизация вывода
ob_start();
include ROOT . 'app/admin/templates/blog/blog.tpl';
$content = ob_get_contents();
ob_end_clean();


include ROOT . 'app/admin/templates/template.tpl';