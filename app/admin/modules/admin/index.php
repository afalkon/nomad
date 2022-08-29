<?php

// Буферизация вывода
ob_start();
include ROOT . 'app/admin/templates/main/main.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'app/admin/templates/template.tpl';