<script src="<?php echo HOST; ?>app/libs/ckeditor/ckeditor.js"></script>

<div class="admin-page__content-form">
    <form enctype="multipart/form-data" class="admin-form" method="POST" action="<?=HOST?>admin/post-edit?id=<?=$post->id?>">
        <div class="admin-form__item">
            <h2 class="heading">Редактировать пост </h2>
        </div>
        <?php include ROOT . 'app/admin/templates/components/errors.tpl' ?>
        <?php include ROOT . 'app/admin/templates/components/success.tpl' ?>

        <div class="admin-form__item">
            <label class="input__label">Введите название записи
            <input name="title" class="input input--width-label" type="text" value="<?=$post->title?>" />
            </label>
        </div>
        <div class="admin-form__item">
            <label class="select-label">
            Выберите категорию
                <select class="select" name="cat">
                    <?php foreach($cats as $cat): ?>
                        <option <?php echo $post['cat'] == $cat['id'] ? 'selected' : '' ; ?> value="<?=$cat->id?>"><?=$cat->title?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
        <div class="admin-form__item">
            <label class="textarea__label mb-15">Содержимое поста</label>
            
            <textarea id="editor" name="content" class="textarea textarea--width-label"><?=$post->content?></textarea>
            
        </div>
        <div class="admin-form__item">
            <div class="block-upload">


                <div class="block-upload__description">
                    <div class="block-upload__title">Обложка поста:</div>
                    <?php if(empty($post->cover)): ?>
                    <p>Изображение jpg или png, рекомендуемая ширина 945px и больше, высота от 400px и более. Вес до 2Мб.</p>
                    <div class="block-upload__file-wrapper">
                        <input name="cover" style="resize: none;" class="file-button" type="file">
                    </div>
                    <?php else: ?>
                    <div id="blocktoshow">
                        <p>Изображение gif, jpeg, jpg или png, рекомендуемая ширина 600px и больше, высота от 300px и более. Вес до 12Мб.</p>
                        <div class="block-upload__file-wrapper">
                            <input name="cover" style="resize: none;" class="file-button" type="file">
                        </div>
                    </div>
                    <div class="block-upload__img">
                        <img src="<?=HOST?>app/usercontent/blog/covers/<?=$post->coverSmall?>">
                        <div class="block-downloads__delete">
                            <button id="button-change" class="delete-button button-change" type="reset">Изменить</button>
							<a href="<?=HOST?>admin/post-edit?id=<?=$post['id']?>&purpose=deleteCover" class="delete-button">Удалить</a>
						</div>
                    </div>
                    <?php endif; ?>
                </div>


        
            </div>
        </div>
        <div class="admin-form__item buttons">
            <button name="postEdit" value="postEdit" class="primary-button" type="submit">Сохранить</button><a class="secondary-button" href="<?=HOST?>admin/blog">Отмена</a>
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