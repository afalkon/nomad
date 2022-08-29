<script src="<?php echo HOST; ?>app/libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">
    <form enctype="multipart/form-data" class="admin-form" method="POST" action="<?=HOST?>admin/post-new">
        <div class="admin-form__item">
            <h2 class="heading">Добавить пост </h2>
        </div>
        <?php include ROOT . 'app/admin/templates/components/errors.tpl' ?>
        <?php include ROOT . 'app/admin/templates/components/success.tpl' ?>

        <div class="admin-form__item">
            <label class="input__label">Введите название записи <input name="title" class="input input--width-label" type="text" placeholder="Заголовок поста" />
            </label>
        </div>
        <div class="admin-form__item">
            <label class="select-label">
            Выберите категорию
                <select class="select" name="cat">
                    <?php foreach($cats as $cat): ?>
                        <option value="<?=$cat['id']?>"><?=$cat['title']?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="admin-form__item">
            <label class="textarea__label mb-15">Содержимое поста</label>
            
            <textarea id="editor" name="content" class="textarea textarea--width-label" placeholder="Введите текст"></textarea>
            
        </div>
        <div class="admin-form__item">
            <div class="block-upload">


                <div class="block-upload__description">
                    <div class="block-upload__title">Обложка поста:</div>
                    <p>Изображение gif, jpeg, jpg или png, рекомендуемая ширина 600px и больше, высота от 300px и более. Вес до 12Мб.</p>
                    <div class="block-upload__file-wrapper">
                        <input name="cover" style="resize: none;" class="file-button" type="file">
                        <div class="block-upload__file-name"></div>
                    </div>
                </div>


        
            </div>
        </div>
        <div class="admin-form__item buttons">
            <button name="submit" value="submit" class="primary-button" type="submit">Опубликовать</button><a class="secondary-button" href="<?=HOST?>admin/blog">Отмена</a>
        </div>
        <div class="admin-form__item"></div>
        <div class="admin-form__item"></div>
    </form>
</div>

<script>
    CKEDITOR.replace('editor', {
        filebrowserUploadMethod: 'form',
        filebrowserUploadUrl: '<?php echo HOST; ?>app/libs/ck-upload/upload.php'
    });
</script>