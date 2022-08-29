<div class="admin-page__content-form">
    <form class="admin-form" method="POST" action="<?=HOST?>admin/post-delete?id=<?=$post['id']?>">
        <div class="admin-form__item">
            <h2 class="heading">Удалить пост </h2>
        </div>
        <div class="admin-form__item">

            <p><strong>Вы действителььно хотите удалить пост?</strong></p>
            <p><strong>id: </strong><?=$post['id']?></p>
            <p><strong>Название: </strong><?=$post['title']?></p>

            
        <div class="admin-form__item buttons">
            <button name="postDelete" value="submit" class="primary-button" type="submit">Удалить</button>
            <a class="secondary-button" href="<?=HOST?>admin/blog">Отмена</a>
        </div>
        <div class="admin-form__item"></div>
        <div class="admin-form__item"></div>
    </form>
</div>