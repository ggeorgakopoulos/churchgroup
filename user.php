<?php include_once 'assets/inc/header.php'; ?>

<?php
$query = "SELECT * FROM `users` WHERE `id`='".$_COOKIE['user_id']."'";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run);
?>
<div class="user-profile">
    <img class="prof-img" src="assets/img/default_avatar.png" alt="Image" draggable="false">
    <h1 class="name"><?php echo ucfirst($row['firstname']).' '.ucfirst($row['lastname']) ?>
        <span>&lt;<?php echo $row['username'] ?>&gt;</span>
    </h1>
    <h3 class="email"><?php echo $row['email'] ?></h3>

    <a href="<?php echo ABSPATH ?>logout" class="btn btn-default ripple-effect">Logout <i class="fa fa-sign-out"></i></a>
</div>


<?php include_once 'assets/inc/footer.php'; ?>
