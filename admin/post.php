<?php
include_once 'header.base.php';

if (!is_admin()) {
    header('Location: ../index');
}


if (isset($_GET['action'])) {
    $action = trim(strtolower($_GET['action']));

    if ($action == 'events') {

        include_once './post_files/event.php';

    } else if ($action == 'images') {

        include_once './post_files/images.php';

    } else if ($action == 'videos') {

        include_once './post_files/videos.php';
    } else if ($action == 'edit_event') {
        if (isset($_GET['post_id'])) {
            include_once './post_files/edit_event.php';
        } else {
            header('Location: index.php');
            exit();
        }
    } else if ($action == 'edit_video') {
        if (isset($_GET['post_id'])) {
            include_once './post_files/edit_video.php';
        } else {
            header('Location: index.php');
            exit();
        }
    } else {
        header('Location: index.php');
        exit();
    }
 } else {
    header('Location: index.php');
    exit();
}

include_once 'footer.base.php';







