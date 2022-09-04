<script src="<?php echo HOST; ?>app/libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">
    <form class="admin-form" method="POST" action="<?=HOST?>admin/contacts">
        <div class="admin-form__item mb-40">
            <h2 class="heading">Редактировать страницу "Контакты"</h2>
        </div>
        <hr class="mb-20">

        <?php include ROOT . 'app/admin/templates/components/errors.tpl' ?>
        <?php include ROOT . 'app/admin/templates/components/success.tpl' ?>

        <div class="admin-form__item">
            <label class="input__label">Заголовок секции "Обо мне"
            <input name="about_title" class="input input--width-label" type="text" placeholder="<?=$values->about_title?>" />
            </label>
        </div>
        <div class="admin-form__item">
            <label class="textarea__label mb-15">Содержимое секции "Обо мне"</label>
            
            <textarea class="about_text" id="editor" name="about_text" class="textarea textarea--width-label"><?=$values->about_text?></textarea>
            
        </div>

        <div class="admin-form__item">
            <label class="input__label">Заголовок секции "Услуги"
            <input name="services_title" class="input input--width-label" type="text" placeholder="<?=$values->services_title?>" />
            </label>
        </div>
        <div class="admin-form__item">
            <label class="textarea__label mb-15">Содержимое секции "Услуги"</label>
            
            <textarea class="services_text" id="editor" name="services_text" class="textarea textarea--width-label"><?=$values->services_text?></textarea>
            
        </div>

        <div class="admin-form__item">
            <label class="input__label">Заголовок секции "Контактная информация"
            <input name="contacts_title" class="input input--width-label" type="text" placeholder="<?=$values->contacts_title?>" />
            </label>
        </div>
        <div class="admin-form__item">
            <label class="textarea__label mb-15">Содержимое секции "Контактная информация"</label>
            
            <textarea class="contacts_text" id="editor" name="contacts_text" class="textarea textarea--width-label"><?=$values->contacts_text?></textarea>
            
        </div>


        <div class="admin-form__item buttons">
            <button name="submit" value="submit" class="primary-button" type="submit">Сохранить</button><a class="secondary-button" href="<?=HOST?>admin/blog">Отмена</a>
        </div>
        <div class="admin-form__item"></div>
        <div class="admin-form__item"></div>
    </form>
</div>

<script>
    CKEDITOR.replace('about_text', {
    });
    CKEDITOR.replace('services_text', {
    });
    CKEDITOR.replace('contacts_text', {
    });
</script>