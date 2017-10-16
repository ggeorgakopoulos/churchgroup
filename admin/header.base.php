<?php
require_once '../config/base.php';
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
    <link rel="stylesheet" href="<?php echo ABSPATH ?>admin/css/main.css">
    <link rel="stylesheet" href="<?php echo ABSPATH ?>assets/fonts/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="<?php echo ABSPATH ?>assets/js/libs/jquery-2.1.4.min.js"></script>
</head>
<body>

<!--SIDE NAV-->
<div class="side-nav visible">
    <!--Side-nav content-->
    <nav class="side-nav-menu">
        <ul>
            <li><a href="<?php echo ABSPATH; ?>admin/index" class="ripple-effect"><i class="fa fa-tachometer"></i>&nbsp; Πίνακας ελέγχου</a></li>
            <li><a href="<?php echo ABSPATH; ?>admin/users" class="ripple-effect"><i class="fa fa-user"></i>&nbsp; Μέλη</a></li>
            <li>
                <div class="side-nav-heading">
                    <i class="fa fa-tasks"></i>&nbsp; Ανάρτηση &nbsp;<i class="fa fa-caret-right changing-fa"></i>
                </div>
                <ul class="side-nav-dropdown">
                    <li><a href="<?php echo ABSPATH; ?>admin/post?action=events" class="ripple-effect"><i class="fa fa-align-center"></i>&nbsp; Ανακοίνωση-Άρθρο</a></li>
                    <li><a href="<?php echo ABSPATH; ?>admin/post?action=images" class="ripple-effect"><i class="fa fa-image"></i>&nbsp; Εικόνες</a></li>
                    <li><a href="<?php echo ABSPATH; ?>admin/post?action=videos" class="ripple-effect"><i class="fa fa-youtube-play"></i>&nbsp; Βίντεο</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!--Footer-->
    <footer class="side-nav-footer">
        <p>
            Πίνακας ελέγχου <a href="http://greekcoder.com" style="color: #fff;">greekcoder</a> <span style="font-family: sans-serif;">&copy;</span> 2016
        </p>
    </footer>
</div>
<!--CLOSE SIDE NAV-->

<header class="site-header">
    <div class="header-text-wrap">
        <!--Hambuger Icon-->
        <div class="hamburger">
            <i class="material-icons">menu</i>
        </div>
        <!--Page Title-->
        <h1 class="site-title"><a href="<?php echo ABSPATH; ?>admin/index"><span class="thin">admin</span><span class="thick">panel</span><a href="<?php echo ABSPATH; ?>"><i class="material-icons">code</i></a></a></h1>

        <nav class="normal-nav">
            <ul class="nav-menu-user-wrap">
                <li class="normal-li"><a class="nav-menu-user"> <img src="<?php echo ABSPATH ?>assets/img/default_avatar.png" class="nav-avatar"><?php echo ucfirst(get_user_info('firstname')); ?> <i class="fa fa-caret-down"></i></a></li>
                <li class="nav-menu-user-dropdown">
                    <ul>
                        <li><a href="<?php echo ABSPATH; ?>" class="ripple-effect"><i class="fa fa-arrow-left"></i>&nbsp; Πίσω στο site</a></li>
                        <li><a href="<?php echo ABSPATH; ?>user" class="ripple-effect"><i class="fa fa-gear"></i>&nbsp; Ρυθμίσεις</a></li>
                        <li><a href="<?php echo ABSPATH; ?>logout" class="ripple-effect"><i class="fa fa-power-off"></i>&nbsp; Αποσύνδεση</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

    </div>
</header>

<div class="page-content-wrap">



