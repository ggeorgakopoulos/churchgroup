<?php
require_once '../config/base.php';
$query = "SELECT * FROM `posts` WHERE `type`='videos'";
$query_run = mysql_query($query);
?>
<h1 class="table-title"><i class="fa fa-youtube-play"></i> Ανεβασμένα Βίντεο</h1>
<table style="table-layout: fixed;">
    <tr>
        <th>Τίτλος</th>
        <th>Περιγραφή</th>
        <th>URL embeded</th>
        <th>Ημερομηνία</th>
        <th>Ενέργειες</th>

    </tr>
<?php
while ($row = mysql_fetch_assoc($query_run)) {
?>

    <tr>
        <td style="max-width: 300px" title="<?php echo $row['title'] ?>"><?php echo $row['title'] ?></td>
        <td style="max-width: 200px" title="<?php echo $row['descr'] ?>"><?php echo $row['descr'] ?></td>
        <td style="max-width: 300px" title="<?php echo htmlentities($row['content']) ?>"><?php echo htmlentities($row['content']) ?></td>
        <td style="max-width: 100px"><?php echo string_to_date($row['date_posted']) ?></td>
        <td style="max-width: 80px" class="action">
            <a href="<?php echo ABSPATH ?>admin/post?action=edit_video&post_id=<?php echo $row['id'] ?>" style="color: black;"><i class="fa fa-edit" title="Επεξεργασία δημοσίευσης"></i></a>
            <i class="fa fa-trash" title="Διαγραφή βίντεο" onclick="delete_post(<?php echo $row['id'] ?>)"></i>
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
