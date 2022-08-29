<?php
include ROOT . 'app/admin/templates/_page-parts/_head.tpl';
include ROOT . 'app/admin/templates/_parts/_sidebar.tpl';

echo '<div class="admin-page__content">';
echo $content;
echo '</div>';

include ROOT . 'app/admin/templates/_page-parts/_foot.tpl';