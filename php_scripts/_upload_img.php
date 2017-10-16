<?php
require_once '../config/base.php';
if (!empty(@$_POST['title']) && !empty(@$_POST['descr']) && !empty($_FILES['files']['name'][0])) {
    $title = mysql_real_escape_string(trim($_POST['title']));
    $descr = $_POST['descr'];
    $files = $_FILES['files'];

    if (empty($files['name'][21])) {

        //query 0
        $query_0 = "SELECT `id` FROM `posts` WHERE `type`='images' and `title`='$title'";
        $query_0_run = mysql_query($query_0);
        $query_0_num_rows = mysql_num_rows($query_0_run);

        if ($query_0_num_rows == 0) {
            $query = "INSERT INTO `posts` VALUES('', 'images', '$title', '$descr', '', 'images', '" . pick_rand_color() . "', '" . get_user_info('username') . "', now())";
            mysql_query($query);
        } else {
            die('Ο τίτλος χρηισιμοποιείτε ήδη');
        }

        //query_2
        $query_2 = "SELECT `id` FROM `posts` WHERE `title`='$title' LIMIT 1";
        $query_2_run = mysql_query($query_2);
        $id = mysql_result($query_2_run, 0);
        //end

        $uploaded = Array();
        $failed = Array();

        $allowed = Array('png', 'jpg', 'gif');

        foreach ($files['name'] as $position => $file_name) {
            $file_tmp = $files['tmp_name'][$position];
            $file_size = $files['size'][$position];
            $file_error = $files['error'][$position];

            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));

            if (in_array($file_ext, $allowed)) {

                if ($file_error == 0) {

                    if ($file_size <= 2097152) {


                        $file_name_new = uniqid('', true) . '.' . $file_ext;
                        if (!file_exists('../assets/img/uploaded/' . $id)) {
                            mkdir('../assets/img/uploaded/' . $id);
                        }

                        $file_destination = '../assets/img/uploaded/' . $id . '/' . $file_name_new;

                        if (move_uploaded_file($file_tmp, $file_destination)) {

                            $uploaded[$position] = $file_destination;


                            $query = "INSERT INTO `images` VALUES('', '$id', '" . substr($file_destination, 3) . "') ";
                            mysql_query($query);

                        }
                    }
                }
            }
        }
    } else {
        die('Ανεβάστε το μέγιστο 20 φωτογρφίες ανα κατηγορία<br><a href="'.ABSPATH.'admin/post?action=images">πήγαινε πίσω</a>');
    }

echo 'Οι φωτογραφίες αναρτήθηκαν<br>
<a href="'.ABSPATH.'admin/post?action=images">πήγαινε πίσω</a>';

} else {
    echo 'Όλα τα πεδία απαιτούνται<br>
    <a href="'.ABSPATH.'admin/post?action=images">πήγαινε πίσω</a>';
}

?>



