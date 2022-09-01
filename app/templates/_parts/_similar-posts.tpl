<section class="page-post__see-also">
    <div class="container">
        <div class="page-post__title">
            <h2 class="heading">Смотрите также </h2>
        </div>
        <div class="row">

        <?php foreach($similarPosts as $similarPost): ?>

            <div class="col-4">
                <div class="card-post">
                    <div class="card-post__img"><a href="<?=HOST?>blog?id=<?=$similarPost['id']?>"><img src="<?=HOST?>app/usercontent/blog/covers/<?=$similarPost['cover_small']?>" alt="Как устроена подземка в NY. Плюсы и минусы" /></a></div>
                    <h4 class="card-post__title"><a href="<?=HOST?>blog?id=<?=$similarPost['id']?>"><?=$similarPost['title']?></a></h4>
                </div>
            </div>

        <?php endforeach; ?>

        </div>
    </div>
</section>