<div class="admin-page__content-form">
    <div class="admin-form" style="width: 900px;">
        <div class="admin-form__item d-flex justify-content-between mb-20">
            <h2 class="heading">Сообщения</h2>
        </div>
        <?php include ROOT . 'app/admin/templates/components/errors.tpl' ?>
        <?php include ROOT . 'app/admin/templates/components/success.tpl' ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th></th>
                    <th>Email</th>
                    <th>Сообщение</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($messages as $message): ?>
                <tr <?php echo $message['unread'] == 1 ? 'style="background-color: #f0f3f6"' : ''; ?>>
                    <td><a href="<?=HOST?>admin/messages?id=<?=$message['id']?>">
                    <?=$message['name']?>
                        </a></td>
                    
                    <td><a href="<?=HOST?>admin/messages?id=<?=$message['id']?>">
                    <?php if(!empty($message['timestamp'])): ?>
                        <?=rus_date("j F Y, H:i", $message['timestamp'])?>
                    <?php endif; ?>
                        </a></td>
                    
                    <td><a href="<?=HOST?>admin/messages?id=<?=$message['id']?>">
                    <?=$message['email']?>
                        </a></td>
                    <td><a href="<?=HOST?>admin/messages?id=<?=$message['id']?>">
                    <?=mb_substr($message['message'], 0, 10)?>
                    <?php echo strlen($message['message']) > 11 ? '...' : ''; ?>
                        </a></td>
                    
                    <td>
                        <a href="<?=HOST?>admin/messages?action=delete&id=<?=$message['id']?>" class="icon-delete"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>