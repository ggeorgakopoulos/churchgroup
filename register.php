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

                        if (is_admin()) {
                            header('Location: admin/index');
                            exit();
                        }
                        header('Location: index');
                        exit();
                    } else {
                        $errormsg = 'Ο λογαριασμός σου δεν έχει γίνει ενεργοποιηθεί';
                    }
                } else {
                    $errormsg = 'Λάθος όνομα χρήστη ή κωδικός πρόσβασης';
                }
            } else {
                $errormsg = 'Ο κωδικός πρόσβασης πρέπει να είναι απο 8 έως 40 χαρακτήρες ';
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

    <title>Εγγραφή - Συναντήσεις νέων</title>

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
<body id="register-page">


<script>
    if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    } else {
        xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    function register_user() {
        document.getElementById('msg').innerHTML = '<div style="text-align: center; font-size: 2.5rem; margin-bottom: 1rem;"><i class="fa fa-spinner fa-pulse"></i></div>';
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4 || xmlHttp.readyState == 0 && xmlHttp.status == 200 ) {
                document.getElementById('msg').innerHTML = xmlHttp.responseText;

            }
        }

        parameters = 'firstname=' + document.getElementById('firstname').value + '&lastname=' + document.getElementById('lastname').value + '&username=' + document.getElementById('username').value
            + '&email=' + document.getElementById('email').value + '&password=' + document.getElementById('password').value + '&re-password=' + document.getElementById('re-password').value;

        xmlHttp.open('POST', 'php_scripts/register.php', true);
        xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlHttp.send(parameters);
    }
</script>

<h1 class="title"><i class="fa fa-fort-awesome"></i> Συναντήσεις Nέων</h1>
<div class="register">
    <h1>Εγγραφή</h1>

    <div id="msg"></div>

    <form>

        <div class="group group-halfed" style="width: 38%">
            <input type="text" name="firstname" id="firstname" placeholder="Όνομα" required value="<?php if ( isset($_POST['firstname']) ) { echo $_POST['firstname']; } ?>">
            <span class="bar"></span>
        </div>
        <div class="group group-halfed" style="width: 60%">
            <input type="text" name="lastname" id="lastname" placeholder="Επώνυμο" required value="<?php if ( isset($_POST['lastname']) ) { echo $_POST['lastname']; } ?>">
            <span class="bar"></span>
        </div>
        <div class="group">
            <input type="text" name="username" id="username" required value="<?php if ( isset($_POST['username']) ) { echo $_POST['username']; } ?>">
            <span class="bar"></span>
            <label>Χρήστης</label>
        </div>

        <div class="group">
            <input type="text" name="email" id="email" required value="<?php if ( isset($_POST['email']) ) { echo $_POST['email']; } ?>">
            <span class="bar"></span>
            <label>Email</label>
        </div>

        <div class="group group-halfed" style="width: 49%">
            <input type="password" name="password" id="password" placeholder="Κωδικός" required>
            <span class="bar"></span>
        </div>
        <div class="group group-halfed" style="width: 49%">
            <input type="password" name="re-password" id="re-password" placeholder="Κωδικός ξανά" required>
            <span class="bar"></span>
        </div>

        <div class="group-submit">
            <input type="submit" name="submit" id="submit" onclick="register_user();"  value="ΕΓΓΡΑΦΗ" class="btn btn-default ripple-effect">
        </div>
    </form>
    <div style="text-align: center; margin-bottom: 20px;">Έχεις ήδη λογαριασμό; <a href="<?php echo ABSPATH ?>login">Κάνε σύνδεση</a></div>
</div>
<h2 id="author">created by <a href="http://greekcoder.com" target="_blank">GreekCoder</a></h2>
</body>

<script src="<?php echo ABSPATH ?>assets/js/ripple-effect.js"></script>
<script src="<?php echo ABSPATH ?>assets/js/register.js"></script>
</html>
