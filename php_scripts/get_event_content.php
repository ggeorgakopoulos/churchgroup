<?php
require_once '../config/base.php';

if (isset($_POST['id'])) {
   $id = mysql_real_escape_string(trim($_POST['id']));
    if (!empty($id)) {
        $query = "SELECT `content`, `title` FROM `posts` WHERE `type`='event' AND `id`='$id'";
        $query_run = mysql_query($query);
        $row = mysql_fetch_assoc($query_run);


        $content = $row['content'];
        $title = $row['title'];
        echo '<h1 style="text-align: center">'.$title.'</h1> <br /><br />'.$content;
    }
}

