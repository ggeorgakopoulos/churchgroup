<?php

    $query = "SELECT * FROM `posts` WHERE `type`='pinned' LIMIT 1";
    $query_run = mysql_query($query);
    $post = mysql_fetch_assoc($query_run);