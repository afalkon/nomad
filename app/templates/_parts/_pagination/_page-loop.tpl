<?php for ($page = 1; $page <= $pagination['numberOfPages']; $page++) : ?>
<div class="section-pagination__item"> <a class="pagination-button <?php echo $pagination['pageNumber'] == $page ? 'active' : ''; ?>"
        href="?page=<?=$page?><?php echo isset($_GET['cat_id']) ? '&cat_id=' . $_GET['cat_id'] : '' ; ?>">
        <?=$page?>
    </a>
</div>
<?php endfor; ?>