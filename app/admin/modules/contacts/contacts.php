<?php

if($_SESSION['logged_user']['role'] === 'admin'){

    $values = R::load('contacts', 1);

    if(isset($_POST['submit'])){
        $values->about_title = rtrim($_POST['about_title']);
        $values->about_text = $_POST['about_text'];
        $values->services_title = rtrim($_POST['services_title']);
        $values->services_text = $_POST['services_text'];
        $values->contacts_title = rtrim($_POST['contacts_title']);
        $values->contacts_text = $_POST['contacts_text'];

        $result = R::store($values);

        if($result){
            $_SESSION['success'][] = ['title' => 'Изменения успешно сохранены!'];
        } else {
            $_SESSION['errors'][] = ['title' => 'Произошла ошибка на стадии сохранения бина'];
        }
    }



    // Буферизация вывода
    ob_start();
    include ROOT . 'app/admin/templates/contacts/contacts.tpl';
    $content = ob_get_contents();
    ob_end_clean();


    include ROOT . 'app/admin/templates/template.tpl';

} else {
    header("Location: " . HOST);
}