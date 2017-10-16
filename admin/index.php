<?php
include_once 'header.base.php';

if (!is_admin()) {
    header('Location: ../index');
}

include_once '../php_scripts/get_post_event_info.php';
?>
<br><br>
<?php include_once '../php_scripts/get_post_videos_info.php'; ?>
<br><br>
<?php include_once '../php_scripts/get_post_images_info.php'; ?>




<?php include_once 'footer.base.php' ?>

