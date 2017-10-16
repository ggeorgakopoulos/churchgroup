<?php
require_once 'config/base.php';
if (is_logged_in()) {
    if (is_admin()) {
        header('Location: admin/index');
    }
    header('Location: index');
}

if (isset($_POST['submit'])) {
    $username = mysql_real_escape_string(strtolower(trim($_POST['username'])));
    $password = mysql_real_escape_string($_POST['password']);

    if ( !empty($username) && !empty($password) ) {
        if (preg_match('/^[_a-zA-Z0-9]{5,25}$/', $username)) {

            $password_length = strlen($password);
            $pass_enc = encrypt($password);

            if ( $password_length >= 8 && $password_length <= 40 ) {
                $query = "SELECT `id`, `is_active` FROM `users` WHERE `username`='$username' AND `password`='$pass_enc' LIMIT 1";
                $query_run = mysql_query($query);
                $query_num_rows = mysql_num_rows($query_run);

                if ( $query_num_rows == 1 ) {
                    $result = mysql_fetch_assoc($query_run);

                    if ($result['is_active'] == 1) {

                        setcookie('user_id', $result['id'], time() + (60 * 60 * 24 * 365 * 5));

                        header('Location: index');
                        exit();

                    } else {
                        $errormsg = 'Ο λογαριασμός σου δεν έχει εγγριθεί ακόμη';
                    }
                } else {
                    $errormsg = 'Λάθος όνομα χρήστη ή κωδικός πρόσβασης';
                }
            } else {
                $errormsg = 'Ο κωδικός πρόσβασης πρέπει να είναι απο 8 έως 40 χαρακτήρες';
            }
        } else {
            $errormsg = 'Το όνομα χρήστη πρέπει να είναι απο 5 έως 25 λατινικούς χαρακτήρες ή και αριθμούς';
        }
    } else {
        $errormsg = 'Συμπληρώστε όλα τα πεδία';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Σύνδεση - Συναντήσεις νέων</title>

    <meta name="author" content="Giorgos Georgakopoulos">
    <meta name="description" content="**">
    <meta name="keywords" content="Χριστιανισμός, ορθοδοξία">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index,follow">
    <meta name="revisit-after" content="3 hours">

    <link rel="stylesheet" href="<?php echo ABSPATH ?>assets/styles/main.css">
    <link rel="stylesheet" href="<?php echo ABSPATH ?>assets/fonts/font-awesome/css/font-awesome.min.css">

    <script src="<?php echo ABSPATH ?>assets/js/libs/jquery-2.1.4.min.js"></script>
</head>
<body id="login-page">

<h1 class="title"><i class="fa fa-fort-awesome"></i> Συναντήσεις Nέων</h1>
<div class="login">
    <h1>Συνδέσου</h1>

    <?php if(isset($errormsg)) { echo '<p class="form-error">'.$errormsg.'</p>'; } ?>
    <?php if(isset($successmsg)) { echo '<p class="form-success">'.$successmsg.'</p>'; } ?>

    <form action="login" method="POST">
        <div class="group">
            <input type="text" name="username" id="username" required>
            <span class="bar"></span>
            <label>Χρήστης</label>
        </div>

        <div class="group">
            <input type="password" name="password" id="password" required>
            <span class="bar"></span>
            <label>Κωδικός</label>
        </div>

        <div class="group-submit">
            <input type="submit" name="submit" id="submit" value="ΣΥΝΔΕΣΗ" class="btn btn-default ripple-effect">
        </div>
    </form>
    <div style="text-align: center; margin-bottom: 20px;">Δεν έχεις λογαριασμό; <a href="<?php echo ABSPATH ?>register">Κάνε Εγγραφή</a></div>
</div>

<h2 id="author">created by <a href="http://greekcoder.com" target="_blank">GreekCoder</a></h2>
</body>

<script src="<?php echo ABSPATH ?>assets/js/ripple-effect.js"></script>
</html>
