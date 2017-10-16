<?php

if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '0', time() - 10);
    header('Location: login');
    exit();
} else {
    header('Location: login');
    exit();
}

?>