<?php

require_once '../config/base.php';

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re-password'])) {
    $firstname = mysql_real_escape_string(strtolower(trim($_POST['firstname'])));
    $lastname = mysql_real_escape_string(strtolower(trim($_POST['lastname'])));
    $username = mysql_real_escape_string(strtolower(trim($_POST['username'])));
    $email = mysql_real_escape_string(strtolower(trim($_POST['email'])));
    $password = $_POST['password'];
    $re_password = $_POST['re-password'];


    if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password) && !empty($re_password)) {

        if (preg_match('/^[a-zA-Zα-ωΑ-Ω]{2,32}$/', $firstname) && preg_match('/^[a-zA-Zα-ωΑ-Ω]{2,32}$/', $lastname)) {
            if (preg_match('/^[_a-zA-Z0-9]{5,25}$/', $username)) {
                if (preg_match('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,10})$/', $email)) {
                    if ($password == $re_password) {

                        $password_length = strlen($password);

                        if ($password_length >= 8 && $password_length <= 40) {

                            $query = "SELECT `username`, `email` FROM `users` WHERE `username` = '$username' OR `email` = '$email' LIMIT 1";
                            $query_run = mysql_query($query);
                            $query_num_rows = mysql_num_rows($query_run);

                            if ($query_num_rows == 1) {
                                $result = mysql_fetch_assoc($query_run);
                                $email_from_db = $result['email'];
                                $username_from_db = $result['username'];

                                if ($username == $username_from_db) {
                                    echo '<p class="form-error">Username already exists!</p>';
                                } else if ($email == $email_from_db) {
                                    echo '<p class="form-error">Email is already in use</p>';
                                }

                            } else if ($query_num_rows == 0) {
                                $pass_enc = encrypt($password);

                                $query = "INSERT INTO `users` VALUES('', '$username', '$pass_enc','$email','$firstname', '$lastname', 0, 0, now())";
                                if (mysql_query($query)) {

                                    $to = $email;
                                    $subject = 'Μόλις έκανες εγγραφή στην ομάδα νέων';
                                    $message = "

Σε ευχαριστούμε που δημιούργησες λογαριασμό στην ομάδα νέων
Δεν μπορείς να συνδεθείς απευθείας στον λογαριασμό σου, πρέπει κάποιος απο τους διαχειριστές να εγγρίνει την εγγραφή σου πρώτα


Πληροφορίες που θα χρειαστείς:
------------------------
Όνομα χρήστη: $username
Κωδικός: $password
------------------------

Καλή σου ημέρα...
                                    ";

                                    $headers = 'From: F.AUGUSTINE <noreply@greekcoder.com>' . "\r\n";

                                    mail($to, $subject, $message, $headers);

                                    echo '<p class="form-success">Ο λογαριασμός σου δημιουργήθηκε, για να συνδεθείτε, θα πρέπει να εγγριθεί απο τον διαχειριστή</p>';
                                    $firstname = null;
                                    $lastname = null;
                                    $username = null;
                                    $email = null;
                                    $password = null;
                                    $re_password = null;

                                } else {
                                    echo '<p class="form-error">Υπήρξε κάποιο πρόβλημα, προσπαθείστε ξανά αργότερα</p>';
                                }
                            }
                        } else {
                            echo '<p class="form-error">Ο κωδικός πρόσβασης πρέπει να είναι απο 8 έως 40 χαρακτήρες</p>';
                        }
                    } else {
                        echo '<p class="form-error">Οι κωδικοί πρόσβασης δεν ταιριάζουν</p>';
                    }
                } else {
                    echo '<p class="form-error">Πληκτρολογήστε την πραγματική διεύθυνση email σας</p>';
                }
            } else {
                echo '<p class="form-error">Το όνομα χρήστη πρέπει να είναι απο 5 έως 25 λατινικούς χαρακτήρες ή και αριθμούς</p>';
            }
        } else {
            echo '<p class="form-error">Παρακαλούμε πληκτρολογήστε το πραγματικό σας όνομα</p>';
        }
    } else {
        echo '<p class="form-error">Συμπληρώστε όλα τα πεδία</p>';
    }
}