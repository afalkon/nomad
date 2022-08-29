<div class="admin-page__content-form">
    <div class="admin-form" style="width: 900px;">
        <div class="admin-form__item d-flex justify-content-between mb-20">
            <h2 class="heading">Блог - все записи</h2><a class="secondary-button"
                href="<?=HOST?>admin/post-new">Добавить запись</a>
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
                <?php foreach($posts as $post): ?>
                <tr>
                    <td>
                        <?=$post['id']?>
                    </td>
                    <td><a href="<?=HOST?>admin/post-edit?id=<?=$post['id']?>">
                            <?=$post['title']?>
                        </a></td>
                    <td>
                        <a href="<?=HOST?>admin/post-delete?id=<?=$post['id']?>" class="icon-delete"></a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <div class="admin-form__item pt-40">
            <div class="section-pagination">
                <div class="section-pagination__item"><a class="pagination-button" href="#">назад</a>
                </div>
                <div class="section-pagination__item"> <a class="pagination-button active" href="#">1</a>
                </div>
                <div class="section-pagination__item"><a class="pagination-button" href="#">2</a>
                </div>
                <div class="section-pagination__item"><a class="pagination-button" href="#">3</a>
                </div>
                <div class="section-pagination__item"><a class="pagination-button" href="#">вперед</a>
                </div>
            </div>
        </div>
    </div>
</div>