<main class="page-post">
<section class="page-post__post">
    <div class="section-posts">
        <div class="section-posts__title">
            <h1 class="heading"><?=$post['title']?></h1>
        </div>
        <div class="section-posts__info">
            <span>
                <?php echo rus_date("j F Y", $post['timestamp']); ?>
            </span>
            <?php if(!empty($post['cat'])): ?>
            <div class="badge"><a href="<?=HOST?>blog?cat_id=<?=$cat['id']?>"><?=$cat['title']?></a></div>
            <?php endif; ?>   
        </div>
        <div class="section-posts__img"><img src="<?=HOST?>app/usercontent/blog/covers/<?= empty($post['cover']) ? 'noImageFull.jpeg' : $post['cover']; ?>" alt="<?=$post['title']?>" /></div>
        <div class="section-posts__content"><?=$post['content']?></div>
    </div>
    
    <?php include ROOT . "app/templates/_parts/_pagination/_page-post-pag.tpl"; ?>

</section>



<?php include ROOT . "app/templates/_parts/_comments.tpl"; ?>
<?php include ROOT . "app/templates/_parts/_comment-form.tpl"; ?>

<?php include ROOT . "app/templates/_parts/_similar-posts.tpl"; ?>
</main>