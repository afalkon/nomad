<section id="comments" class="page-post__comments">

    <?php include ROOT . 'app/admin/templates/components/errors.tpl' ?>
    <?php include ROOT . 'app/admin/templates/components/success.tpl' ?>

    <div class="page-post__title">
        <h2 class="heading"><?=$commentsNum?>
        <?php if($lastNum == 1): ?> комментарий
        <?php elseif($lastNum > 1 && $lastNum < 5): ?> комментария
        <?php elseif($lastNum > 4 && $lastNum <= 9): ?> комменатриев
        <?php elseif($lastNum == 0): ?> комменатриев
        <?php endif; ?></h2>
    </div>

    <?php foreach($comments as $comment): ?>
    <div class="page-post__comments-comment">
        <div class="comment">
            <div class="comment__avatar"><a href="<?=HOST?>profile?id=<?=$comment['user']?>">
                <?php if(!empty($comment['avatarsmall'])): ?>
                    <div class="avatar-small"><img src="<?=HOST?>app/usercontent/avatars/<?=$comment['avatarsmall']?>" alt="Аватарка" /></div>
                <?php else: ?>
                    <div class="avatar-small"><img src="<?=HOST?>app/usercontent/avatars/noAvatar.jpg" alt="Аватарка" /></div>
                <?php endif; ?>
                </a>
            </div>
            <div class="comment__data">
                <div class="comment__user-info">
                    <div class="comment__username"><?=$comment['name']?> <?=$comment['surname']?></div>
                    <div class="comment__date"><img src="<?=HOST?>app/img/favicons/clock.svg" alt="Дата публикации" /><?=rus_date("j F Y, H:i", $comment['timestamp'])?></div>
                </div>
                <div class="comment__text">
                    <p><?=$comment['comment']?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</section>