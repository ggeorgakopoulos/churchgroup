<?php
require_once '../config/base.php';
$query = "SELECT * FROM `users`";
$query_run = mysql_query($query);
?>
<h1 class="table-title"><i class="fa fa-user"></i> Μέλη</h1>
<table style="width:100%">
    <tr>
        <th>Όνομα</th>
        <th>Χρήστης</th>
        <th>Email</th>
        <th>Κατάσταση</th>
        <th style="text-align: center">Ενέργειες</th>
    </tr>
<?php
while ($row = mysql_fetch_assoc($query_run)) {
?>

    <tr>
        <td><?php echo ucfirst($row['firstname']).' '.ucfirst($row['lastname']); ?></td>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php if ($row['is_active']) { echo 'Έχει εγγριθεί'; } else { echo 'Σε αναμονή'; }  ?></td>
        <?php if ($row['is_active']) : ?>
            <td class="action"><i class="fa fa-close" title="Διαγραφή χρήστη" onclick="delete_user(<?php echo $row['id'] ?>)"></i></td>
        <?php else : ?>
            <td class="action"><i class="fa fa-check" title="Έγγριση" onclick="activate_user(<?php echo $row['id'] ?>)"></i> <i class="fa fa-close" title="Διαγραφή χρήστη" onclick="delete_user(<?php echo $row['id'] ?>)"></i></td>
        <?php endif; ?>
    </tr>

<?php } ?>
</table>

<script>
    function activate_user(id) {
        $.ajax({
            type: "POST",
            url: "../php_scripts/activate_user.php",
            data: { user_id : id},
            success: function(data){
                alert(data);
                location.reload();
            }
        });
    }
    function delete_user(id) {
        $.ajax({
            type: "POST",
            url: "../php_scripts/delete_user.php",
            data: { user_id : id},
            success: function(data){
                alert(data);
                location.reload();
            }
        });
    }

</script>
