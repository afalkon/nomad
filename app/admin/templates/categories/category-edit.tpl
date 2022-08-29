
<div class="admin-page__content-form">
<form enctype="multipart/form-data" class="admin-form" method="POST" action="<?=HOST?>admin/category-edit?id=<?=$cat['id']?>">
    <div class="admin-form__item">
        <h2 class="heading">Редактирование категории</h2>
    </div>
    <?php include ROOT . 'app/admin/templates/components/errors.tpl' ?>
    <?php include ROOT . 'app/admin/templates/components/success.tpl' ?>

    <div class="admin-form__item">
        <label class="input__label">Название категории<input name="title" class="input input--width-label" type="text" value="<?=$cat['title']?>" />
        </label>
    </div>
    
    <div class="admin-form__item buttons">
        <button name="submit" value="submit" class="primary-button" type="submit">Сохранить</button><a class="secondary-button" href="<?=HOST?>admin/categories">Отмена</a>
    </div>
    <div class="admin-form__item"></div>
    <div class="admin-form__item"></div>
</form>
</div>