<?php
require_once '../config/base.php';
$query = "SELECT * FROM `posts` WHERE `type`='images'";
$query_run = mysql_query($query);
?>
<h1 class="table-title"><i class="fa fa-image"></i> Ανεβασμένες Κατηγορίες Εικόνων</h1>
<table style="table-layout: fixed;">
    <tr>
        <th>Τίτλος</th>
        <th>Περιγραφή</th>
        <th>Ημερομηνία</th>
        <th>Ενέργειες</th>

    </tr>
<?php
while ($row = mysql_fetch_assoc($query_run)) {
?>

    <tr>
        <td style="max-width: 300px" title="<?php echo $row['title'] ?>"><?php echo $row['title'] ?></td>
        <td style="max-width: 300px" title="<?php echo $row['descr'] ?>"><?php echo $row['descr'] ?></td>
        <td style="max-width: 100px"><?php echo string_to_date($row['date_posted']) ?></td>
        <td style="max-width: 80px" class="action">
            <i class="fa fa-trash" title="Διαγραφή κατηγορίας" onclick="delete_post(<?php echo $row['id'] ?>); delete_image(<?php echo $row['id'] ?>);"></i>
        </td>
    </tr>

<?php } ?>
</table>

<script>
    function delete_post(id) {
        $.ajax({
            type: "POST",
            url: "../php_scripts/delete_post.php",
            data: { post_id : id},
            success: function(data){
                alert(data);
            }
        });
    }
    function delete_image(id) {
        $.ajax({
            type: "POST",
            url: "../php_scripts/delete_image.php",
            data: { post_id : id},
            success: function(){
                location.reload();
            }
        });
    }

</script>
