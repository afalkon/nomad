<?php
if (!empty($_SESSION['success'])) {
    foreach ($_SESSION['success'] as $message) {
        ?>

            <div class="notifications mb-20">
                <div class="notifications__title notifications__title--success"><?php echo $message['title']; ?></div>
            </div>
        <?php
    }
    $_SESSION['success'] = array();
}