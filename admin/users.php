<?php
include_once 'header.base.php';

if (!is_admin()) {
    header('Location: ../index');
}


include_once '../php_scripts/get_users_activation.php';
?>
<br><br>
<?php include_once '../php_scripts/get_users_info_table.php'; ?>


<?php include_once 'footer.base.php' ?>

