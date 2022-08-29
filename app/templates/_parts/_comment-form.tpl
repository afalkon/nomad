<?php if(isset($_SESSION['logged_user']) && !empty($_SESSION['logged_user'])): ?>

<section class="page-post__post-comments">
    <div class="page-post__title">
        <h2 class="heading">Оставить комментарий </h2>
    </div>
    <div class="page-post__comments-post-comment">
        <div class="post-comment">

            <div class="post-comment__avatar">
                <div class="avatar-small">
                    <?php if(!empty($_SESSION['logged_user']['avatar'])): ?>
                        <img src="<?=HOST?>app/usercontent/avatars/<?=$_SESSION['logged_user']['avatarsmall']?>" alt="Аватарка" />
                    <?php else: ?>
                        <img src="<?=HOST?>app/img/usercontent/noAvatar.jpg" alt="Аватарка" />
                    <?php endif; ?>
                </div>
            </div>

            <form action="<?=HOST?>addComment" class="post-comment__form" method="POST">
                <input type="hidden" name="id" value="<?=$_GET['id']?>">
                <div class="post-comment__form-textarea">
                    <textarea name="comment" class="textarea" placeholder="Введите ваш комментарий..."></textarea>
                </div>
                <div class="post-comment__form-button">
                    <button class="primary-button" name="submit" type="submit">Комментировать</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php endif; ?>