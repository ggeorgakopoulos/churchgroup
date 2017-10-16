<?php
require_once 'config/base.php';

if (!is_logged_in()){
    header('Location: login');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Συναντήσεις νέων</title>

    <meta name="author" content="Giorgos Georgakopoulos">
    <meta name="description" content="**">
    <meta name="keywords" content="Χριστιανισμός, ορθοδοξία">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="revisit-after" content="3 hours">

    <link rel="stylesheet" href="<?php echo ABSPATH ?>assets/styles/main.css">
    <link rel="stylesheet" href="<?php echo ABSPATH ?>assets/fonts/font-awesome/css/font-awesome.min.css">

    <script src="<?php echo ABSPATH ?>assets/js/libs/jquery-2.1.4.min.js"></script>
</head>
<body>
    <div class="site-header">
        <div class="site-menu">
           <span><i class="fa fa-fort-awesome"></i></span>
        </div>
        <div class="site-nav">
            <a href="./" id="nav-home"><i class="fa fa-home"></i></a>
            <a href="./videos" id="nav-videos"><i class="fa fa-youtube-play"></i></a>
            <a href="./images" id="nav-images"><i class="fa fa-image"></i></a>
            <a href="./user" id="nav-events"><i class="fa fa-user"></i></a>
        </div>
    </div>

    <?php if (is_admin()) : ?>
    <a href="admin/index" class="admin-link" title="Admin Panel">
        <i class="fa fa-laptop"></i>&nbsp;
    </a>
    <?php endif; ?>


    <script src="./assets/js/countdown.js"></script>
    <div class="time-left" id="time-left">
        <div class="time-left-content">
            <h1 id="countdown"></h1>
            <br>
            <h3 id="countdown-s"></h3>
            <br>
            <h3 id="countdown-t"></h3>
        </div>
    </div>

    <div class="wrapper">




