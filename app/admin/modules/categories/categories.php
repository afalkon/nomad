<?php

$cats = R::findAll('categories');

// Буферизация вывода
ob_start();
include ROOT . 'app/admin/templates/categories/categories.tpl';
$content = ob_get_contents();
ob_end_clean();


include ROOT . 'app/admin/templates/template.tpl';