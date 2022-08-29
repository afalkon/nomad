<?php
if (!empty($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error){
        if (count($error) == 1){
        ?>

            <div class="notifications mb-20">
                <div class="notifications__title notifications__title--error"><?php echo $error['title']; ?></div>
            </div>
        <?php
        } elseif (count($error) == 2){
        ?>
        
            <div class="notifications mb-20 notifications__title--with-message">
                <div class="notifications__title notifications__title--error"><?php echo $error['title']; ?></div>
                <div class="notifications__message">
                    <p><?php echo $error['desc']; ?></p>
                </div>
            </div>
        <?php
        }
    }
    $_SESSION['errors'] = array();
}
?>