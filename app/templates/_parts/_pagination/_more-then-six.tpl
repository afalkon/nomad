<?php if ($pagination['pageNumber'] - 3 === 1): ?>
<div class="section-pagination__item">
<a class="pagination-button"href="?page=1<?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>">1</a>
</div>
<?php elseif ($pagination['pageNumber'] - 3 > 1): ?>
<div class="section-pagination__item">
<a class="pagination-button"href="?page=1">1</a>
</div>
<div class="section-pagination__item">
<a class="pagination-button"href="?page=<?php echo $pagination['pageNumber'] - 3; ?><?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>">...</a>
</div>
<?php endif; ?>


<?php if ($pagination['pageNumber'] - 2 > 0): ?>
<div class="section-pagination__item"> <a class="pagination-button"
        href="<?=HOST?>blog?page=<?php echo $pagination['pageNumber'] - 2; ?><?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>">
        <?php echo $pagination['pageNumber'] - 2; ?>
    </a>
</div>
<?php endif; ?>
<?php if ($pagination['pageNumber'] - 1 > 0): ?>
<div class="section-pagination__item"> <a class="pagination-button"
        href="<?=HOST?>blog?page=<?php echo $pagination['pageNumber'] - 1; ?><?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>">
        <?php echo $pagination['pageNumber'] - 1; ?>
    </a>
</div>
<?php endif; ?>

<div class="section-pagination__item"> <a class="pagination-button active"
        href="<?=HOST?>blog?page=<?=$pagination['pageNumber']?><?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>">
        <?=$pagination['pageNumber']?>
    </a>
</div>

<?php if ($pagination['pageNumber'] + 1 <= $pagination['numberOfPages']): ?>
<div class="section-pagination__item"> <a class="pagination-button"
        href="<?=HOST?>blog?page=<?php echo $pagination['pageNumber'] + 1; ?><?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>">
        <?php echo $pagination['pageNumber'] + 1; ?>
    </a>
</div>
<?php endif; ?>
<?php if ($pagination['pageNumber'] + 2 <= $pagination['numberOfPages']): ?>
<div class="section-pagination__item"> <a class="pagination-button"
        href="<?=HOST?>blog?page=<?php echo $pagination['pageNumber'] + 2; ?><?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>">
        <?php echo $pagination['pageNumber'] + 2; ?>
    </a>
</div>
<?php endif; ?>

<?php if ($pagination['pageNumber'] + 3 === $pagination['numberOfPages']): ?>
<div class="section-pagination__item">
<a class="pagination-button"href="?page=<?=$pagination['numberOfPages']?><?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>"><?=$pagination['numberOfPages']?></a>
</div>
<?php elseif ($pagination['pageNumber'] + 3 < $pagination['numberOfPages']): ?>
<div class="section-pagination__item">
<a class="pagination-button"href="?page=<?php echo $pagination['pageNumber'] + 3; ?><?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>">...</a>
</div>
<div class="section-pagination__item">
<a class="pagination-button"href="?page=<?=$pagination['numberOfPages']?><?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>"><?=$pagination['numberOfPages']?></a>
</div>
<?php endif; ?>