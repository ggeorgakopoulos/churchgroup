<?php

require_once '../config/base.php';


if (isset($_POST['title']) && isset($_POST['descr']) && isset($_POST['content'])) {
    $title = trim($_POST['title']);
    $descr = trim($_POST['descr']);
    $content = $_POST['content'];
    if (!empty($title) && !empty($content)) {
        $query = "INSERT INTO `posts` VALUES('','videos','$title','$descr','$content','videos','".pick_rand_color()."','".get_user_info('username')."', now())";
        if (mysql_query($query)) {
            echo "Δημοσιεύθηκε";
        }
    } else {
        echo "Συμπλήρωσε όλα τα πεδία";
    }
}