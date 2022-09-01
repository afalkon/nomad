

<div class="section bg-grey">
    <div class="container">
        <div class="section__title">
            <h2 class="heading">Комментарии пользователя </h2>
        </div>
        <div class="section__body">
            <div class="row justify-content-center">
                <div class="col-md-10">

                <?php foreach($comments as $comment): ?>
                    <div class="comment">
                        <div class="comment__avatar">

                            <?php if(!empty($user['avatarsmall'])): ?>
                                <div class="avatar-small"><img src="<?=HOST?>app/usercontent/avatars/<?=$user['avatarsmall']?>" alt="Аватарка" /></div>
                            <?php else: ?>
                                <div class="avatar-small"><img src="<?=HOST?>app/usercontent/avatars/noAvatar.jpg" alt="Аватарка" /></div>
                            <?php endif; ?>
                        </div>
                        <div class="comment__data">
                            <div class="comment__user-info">
                                <div class="comment__username"><?=$user['name']?> <?=$user['surname']?></div>
                                <div class="comment__date"><img src="<?=HOST?>app/img/favicons/clock.svg" alt="Дата публикации" /><?=rus_date("j F Y, H:i", $comment['timestamp'])?></div>
                                <a class="ml-10" href="<?=HOST?>blog?id=<?=$comment['post']?>">к посту: <?=$comment['title']?></a>
                            </div>
                            <div class="comment__text">
                                <p><?=$comment['comment']?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>
