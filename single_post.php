
<?php
require_once 'config/base.php';

$query = "SELECT * FROM `posts` WHERE `id`='".mysql_real_escape_string($_GET['id'])."' ORDER BY `date_posted` DESC";
$query_run = mysql_query($query);

$row = mysql_fetch_assoc($query_run)
    ?>
<link rel="stylesheet" href="assets/styles/main.css">
    <div>

        <div class="content open">
            <h1 style="text-align: center; margin: 30px 0"><?php echo $row['title'] ?></h1>
            <hr style="max-width: 960px; margin: 0 auto">
            <div style="max-width: 960px; margin: 0 auto; padding: 10px;"><?php echo $row['content'] ?></div>


        </div>
    </div>
