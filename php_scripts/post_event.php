<?php

require_once '../config/base.php';


if (isset($_POST['title']) && isset($_POST['descr']) && isset($_POST['content'])) {
    $title = trim($_POST['title']);
    $descr = trim($_POST['descr']);
    $content = $_POST['content'];
    if (!empty($title) && !empty($content) && !empty($descr)) {
        if ($_POST['pinned'] == 'on') {
            $query = "UPDATE `posts` SET `type`='event' WHERE `type`='pinned'";
            if (mysql_query($query)) {
                $query = "INSERT INTO `posts` VALUES('','pinned','$title','$descr','$content','event','".pick_rand_color()."','".get_user_info('username')."', now())";
                if (mysql_query($query)) {
                    echo "Δημοσιεύθηκε";
                }
            } else {
                echo "Υπήρξε κάποιο πρόβλημα, προσπαθήστε ξανά χωρίς να κάνετε την δημοσίευση καρφιτσωμένη";
            }
        } else {
            $query = "INSERT INTO `posts` VALUES('','event','$title','$descr','$content','event','".pick_rand_color()."','".get_user_info('username')."', now())";
            if (mysql_query($query)) {
                echo "Δημοσιεύθηκε";
            } else {
                echo "Υπήρξε κάποιο πρόβλημα, προσπαθήστε ξανά αργότερα";
            }
        }
    } else {
        echo "Συμπλήρωσε όλα τα πεδία";
    }
}