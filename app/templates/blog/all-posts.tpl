<main class="page-blog">
<div class="container">
    <div class="page-blog__header">
        <h2 class="heading">Блог </h2>
    </div>
    <div class="page-blog__posts">
        <?php foreach($posts as $post): ?>
        <div class="card-post">
            <div class="card-post__img">
            <a href="<?=HOST?>blog?id=<?=$post['id']?>">
            <img    src="<?=HOST?>app/usercontent/blog/covers/<?= empty($post['coverSmall']) ? 'noImage.jpeg' : $post['coverSmall']; ?>" 
                
                    alt="<?=$post['title']?>" />
            </a></div>
            <h4 class="card-post__title"><a href="<?=HOST?>blog?id=<?=$post['id']?>"><?=$post['title']?></a></h4>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="page-blog__pagination">
        <div class="section-pagination">
            <?php include ROOT . "app/templates/_parts/_pagination.tpl"; ?>
        </div>
    </div>
</div>
</main>