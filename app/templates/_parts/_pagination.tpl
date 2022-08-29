<?php include ROOT . 'app/templates/_parts/_pagination/_button-prev.tpl'; ?>

<?php if ( $pagination['numberOfPages'] > 6): ?>

    <?php include ROOT . 'app/templates/_parts/_pagination/_more-then-six.tpl'; ?>

<?php else: ?>

    <?php include ROOT . 'app/templates/_parts/_pagination/_page-loop.tpl'; ?>

<?php endif; ?>

<?php include ROOT . 'app/templates/_parts/_pagination/_button-next.tpl'; ?>