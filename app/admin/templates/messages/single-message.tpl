<div class="admin-page__content-form">
    <form enctype="multipart/form-data" class="admin-form" method="POST" action="<?=HOST?>admin/post-edit?id=<?=$post->id?>">
        <div class="admin-form__item">
            <h2 class="heading">Сообщение от <?=$message['name']?> </h2>
        </div>

        <div class="admin-form__item">
            <label class="input__label"><?=rus_date("j F Y, H:i", $message['timestamp'])?></label>
        </div>
        <div class="admin-form__item">
            <label class="select-label mb-30">
            Сообщение:
            </label>
            <p><?=$message['message']?></p>
        </div>

        <?php if(!empty($message['file_name'])): ?>
        <div class="admin-form__item">
            <label class="textarea__label mb-15">Прикрепленные файлы:</label>

            <a href="<?=HOST?>app/usercontent/message-files/<?=$message['file_name']?>">
                <div class="block-upload__img">

                    <?php if($isImg == 1): ?>
                        <img class="mb-10" src="<?=HOST?>app/usercontent/message-files/<?=$message['file_name']?>">
                    <?php else: ?>
                        <img class="mb-10" src="<?=HOST?>app/usercontent/message-files/fileIcon.jpg">
                    <?php endif; ?>

                    <?=$message['file_name']?>
                </div>
            </a>
            
        </div>
        <?php endif; ?>
        <div class="admin-form__item buttons">
            <a class="secondary-button" href="<?=HOST?>admin/messages?action=delete&id=<?=$message['id']?>">Удалить</a>
        </div>
        <div class="admin-form__item"></div>
        <div class="admin-form__item"></div>
    </form>
</div>