<?php

$pageTitle = "Главная страница";
$pageClass = 'main-page';



require ROOT . 'app/templates/_page-parts/_head.tpl';
require ROOT . 'app/templates/_parts/_header.html';

require ROOT . 'app/templates/main/main.tpl';

require ROOT . 'app/templates/_parts/_footer.html';
require ROOT . 'app/templates/_page-parts/_foot.tpl';
