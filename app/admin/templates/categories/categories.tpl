<div class="admin-page__content-form">
    <div class="admin-form" style="width: 900px;">
        <div class="admin-form__item d-flex justify-content-between mb-20">
            <h2 class="heading">Категории</h2><a class="secondary-button"
                href="<?=HOST?>admin/category-new">Создать категорию</a>
        </div>
        <?php include ROOT . 'app/admin/templates/components/errors.tpl' ?>
        <?php include ROOT . 'app/admin/templates/components/success.tpl' ?>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($cats as $cat): ?>
                <tr>
                    <td>
                    <?=$cat['id']?>
                    </td>
                    <td><a href="<?=HOST?>admin/category-edit?id=<?=$cat['id']?>">
                    <?=$cat['title']?>
                        </a></td>
                    <td>
                        <a href="<?=HOST?>admin/category-delete?id=<?=$cat['id']?>" class="icon-delete"></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>