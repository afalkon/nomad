<?php

require ROOT . 'app/libs/functions.php';

$pageTitle = "Блог";
    

if ( isset($_GET['id'])){

    include ROOT . 'app/modules/blog/post.php';

} elseif(isset($_GET['cat_id'])) {

    include ROOT . 'app/modules/blog/categories.php';

} else {
    
    include ROOT . 'app/modules/blog/all-posts.php'; 

}





require ROOT . 'app/templates/_page-parts/_head.tpl';
require ROOT . 'app/templates/_parts/_header.html';
require ROOT . 'app/templates/blog/blog.tpl';
require ROOT . 'app/templates/_parts/_footer.html';
require ROOT . 'app/templates/_page-parts/_foot.tpl';