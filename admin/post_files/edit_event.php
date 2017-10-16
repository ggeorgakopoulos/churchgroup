<?php require_once '../config/base.php'; ?>
<script src="<?php echo ABSPATH ?>assets/ckeditor/ckeditor.js"></script>
<?php
$query = "SELECT * FROM `posts` WHERE `type`='event' AND `id`=".mysql_real_escape_string($_GET['post_id'])."";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run);
?>

<h1 class="section-title"><i class="fa fa-edit"></i> Επεξεργασία Ανακοίνωσης</h1>
<div id="msg" style="text-align: center; margin: 20px 0;"></div>

<form>
    <div class="group">
        <input type="text" name="title" id="title" value="<?php echo $row['title'] ?>" required>
        <span class="bar"></span>
        <label>Τίτλος</label>
    </div>

    <div class="group">
        <input type="text" name="descr" id="descr" value="<?php echo $row['descr'] ?>" required>
        <span class="bar"></span>
        <label>Περιγραφή</label>
    </div>

    <textarea  id="content" cols="30" rows="10" required><?php echo $row['content'] ?></textarea>

    <br>
        <input type="button" onclick="update_event(<?php echo $row['id'] ?>)" value="Τροποποίηση" class="btn btn-default">

</form>

<script>
    CKEDITOR.replace( 'content' );
    function update_event(id) {
        document.getElementById('msg').innerHTML = '<div style="text-align: center; font-size: 2.5rem; margin-bottom: 1rem;"><i class="fa fa-spinner fa-pulse"></i></div>';

        title1 = $('#title').val();
        descr1 = $('#descr').val();
        content1 = window.frames[0].document.body.innerHTML;

        $.ajax({
            type: "POST",
            url: "../php_scripts/update_event.php",
            data: { post_id : id, title : title1, descr : descr1, content : content1},
            success: function(data){
                document.getElementById('msg').innerText = data;
            }
        });
    }
</script>