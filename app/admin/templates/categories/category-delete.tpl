<div class="admin-page__content-form">
    <form class="admin-form" method="POST" action="<?=HOST?>admin/category-delete?id=<?=$cat['id']?>">
        <div class="admin-form__item">
            <h2 class="heading">Удаление категории</h2>
        </div>
        <div class="admin-form__item">
            <p>Вы действителььно хотите удалить категорию <strong>"<?=$cat['title']?>"</strong>?</p>
        <div class="admin-form__item buttons">
            <button name="submit" value="submit" class="primary-button" type="submit">Удалить</button>
            <a class="secondary-button" href="<?=HOST?>admin/categories">Отмена</a>
        </div>
        <div class="admin-form__item"></div>
        <div class="admin-form__item"></div>
    </form>
</div>