<?php
require_once '../config/base.php';
$query = "SELECT * FROM `posts` WHERE `type`='event'";
$query_run = mysql_query($query);
?>
<h1 class="table-title"><i class="fa fa-align-center"></i> Δημοσιεύσεις</h1>
<table style="table-layout: fixed;">
    <tr>
        <th>Τίτλος</th>
        <th>Περιγραφή</th>
        <th>Κατηγορία</th>
        <th>Ημερομηνία</th>
        <th>Ενέργειες</th>

    </tr>
<?php
while ($row = mysql_fetch_assoc($query_run)) {
?>

    <tr>
        <td style="max-width: 300px" title="<?php echo $row['title'] ?>"><?php echo $row['title'] ?></td>
        <td style="max-width: 400px" title="<?php echo $row['descr'] ?>"><?php echo $row['descr'] ?></td>
        <td style="max-width: 120px" title="<?php echo category_to_str($row['category']) ?>"><?php echo category_to_str($row['category']) ?></td>
        <td style="max-width: 100px"><?php echo string_to_date($row['date_posted']) ?></td>
        <td style="max-width: 80px" class="action">
            <a href="<?php echo ABSPATH ?>admin/post?action=edit_event&post_id=<?php echo $row['id'] ?>" style="color: black;"><i class="fa fa-edit" title="Επεξεργασία δημοσίευσης"></i></a>
            <i class="fa fa-trash" title="Διαγραφή δημοσίευσης" onclick="delete_post(<?php echo $row['id'] ?>)"></i>
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
                location.reload();
            }
        });
    }

</script>
