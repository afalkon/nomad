<?php

    // Получаем все записи из таблицы 'posts' по 'cat_id'
    $postsNum = R::find('posts', 'cat = ?', [$_GET['cat_id']]);

    // Считаем количество записей в получившемся массиве
    $postsNum = count($postsNum);

    // Передаем реальное количество записей в функцию pagination для расчёта
    $pagination = pagination(6, $postsNum);
    $posts = R::find('posts', 'cat = ?', [$_GET['cat_id']], "ORDER BY id DESC {$pagination['sqlPageLimit']}");

    // Буферизация вывода
    ob_start();
    include ROOT . 'app/templates/blog/all-posts.tpl';
    $content = ob_get_contents();
    ob_end_clean();