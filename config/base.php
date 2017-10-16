<?php
ob_start();

define('ABSPATH', 'http://localhost/churchgroup/');

//Connecting to the database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'churchgroup');

$mysql_error = array(
    'conn' => 'Could not connect to database',
    'db'   => 'Could not select database'
);

mysql_connect(DB_HOST, DB_USER, DB_PASS) OR die($mysql_error['conn']);
mysql_select_db(DB_NAME) OR die($mysql_error['db']);

mysql_query("SET NAMES utf8;");


function encrypt($pass){
    $pass = md5(sha1($pass.'churchgroup-greekcoder'));
    $pass = crypt($pass, 'sample-salt');
    $pass = sha1($pass);
    return $pass;
}

function is_logged_in() {
    if (isset($_COOKIE['user_id'])) {
        return true;
    }
    return false;
}
function is_admin(){
    if (isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
        $query = "SELECT `is_admin` FROM `users` WHERE `id`='$user_id' LIMIT 1";
        $query_run = mysql_query($query);
        $type = mysql_result($query_run, 0, 'is_admin');
        if ($type == 1) {
            return true;
        }
        return false;
    }
}

function string_to_date($strtime) {
    $timestr = strtotime($strtime);
    $date = date( 'd-m-Y', $timestr);
    return $date;
}

function are_posts_type($type){
    $query = "SELECT * FROM `posts` WHERE `type`='$type'";
    $query_run = mysql_query($query);
    $query_num_rows = mysql_num_rows($query_run);
    if ($query_num_rows > 0 ) {
        return true;
    }
    return false;
}

function category_to_str($category) {
    switch($category) {
        case 'event':
            $str = 'Ανακοίνωση';
        break;
        case 'videos':
            $str = 'Βίντεο';
        break;
        case 'images':
            $str = 'Εικόνες';
    }
    return $str;
}



function get_user_info($field) {
    if (is_logged_in()) {
        $query = "SELECT `$field` FROM `users` WHERE `id`='" . mysql_real_escape_string($_COOKIE['user_id']) . "'";
        if ($query_run = mysql_query($query)) {
            if ($query_result = mysql_result($query_run, 0, $field)) {
                return $query_result;
            }
        }
    }
    return false;
}

function pick_rand_color() {
    $color = array('#f1844d', '#1c94c3', '#f26565', '#0eae6c', '#fbbc05', '#34a853', '#e1f5fe', '#4285f4');
    $num = rand(0,7);
    return $color[$num];
}


function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dir."/".$object))
                    rrmdir($dir."/".$object);
                else
                    unlink($dir."/".$object);
            }
        }
        rmdir($dir);
    }
}