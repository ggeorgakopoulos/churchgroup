<?php
require_once '../config/base.php';
$query = "SELECT * FROM `users` ORDER BY `reg_date` ASC";
$query_run = mysql_query($query);
?>
<h1 class="table-title"><i class="fa fa-user"></i> Πληροφορίες Μελών</h1>
<table style="width:100%">
    <tr>
        <th>Όνομα</th>
        <th>Χρήστης</th>
        <th>Email</th>
        <th>Δικαιώματα</th>
        <th>Κατάσταση</th>
        <th>Ημ. Εγγραφής</th>
    </tr>
<?php
while ($row = mysql_fetch_assoc($query_run)) {
?>

    <tr>
        <td><?php echo ucfirst($row['firstname']).' '.ucfirst($row['lastname']); ?></td>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php if ($row['is_admin']) { echo 'Διαχειριστής'; } else { echo 'Απλός Χρήστης'; }  ?></td>
        <td><?php if ($row['is_active']) { echo 'Έχει εγγριθεί'; } else { echo 'Σε αναμονή'; }  ?></td>
        <td><?php echo string_to_date($row['reg_date']) ?></td>
    </tr>

<?php } ?>
</table>