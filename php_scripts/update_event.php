<?php

require_once '../config/base.php';


if (isset($_POST['title']) && isset($_POST['descr']) && isset($_POST['content'])) {
    $title = trim($_POST['title']);
    $descr = trim($_POST['descr']);
    $content = $_POST['content'];
    $id = $_POST['post_id'];
    if (!empty($title) && !empty($content) && !empty($descr)) {

        $query = "UPDATE `posts` SET `title`='$title', `descr`='$descr', `content`='$content' WHERE `id`='$id'";
        if (mysql_query($query)) {
            echo "Τροποποιήθηκε";
        } else {
            echo "Υπήρξε κάποιο πρόβλημα, προσπαθήστε ξανά αργότερα";
        }

    } else {
        echo "Συμπλήρωσε όλα τα πεδία";
    }
}