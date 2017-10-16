<?php

require_once '../config/base.php';

if (isset($_POST['post_id'])) {
    $id = mysql_real_escape_string(trim($_POST['post_id']));

    if (!empty($id)) {
        $query = "DELETE FROM `posts` WHERE `id`='$id'";
        if ($query_run = mysql_query($query)) {
            echo 'Διεγράφη';
        } else {
            echo 'Ανανέωσε τη σελίδα ή επικοινιώνησε με τον Γεωργακόπουλο';
        }
    } else {
        echo 'Ανανέωσε τη σελίδα ή επικοινιώνησε με τον Γεωργακόπουλο';
    }
}