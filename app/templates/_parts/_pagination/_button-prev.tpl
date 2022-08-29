<?php if ( $pagination['pageNumber'] != 1): ?>
<div class="section-pagination__item">
    <a class="pagination-button" href="?page=<?php echo $pagination['pageNumber'] - 1; ?><?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>">назад</a>
</div>
<?php endif; ?>