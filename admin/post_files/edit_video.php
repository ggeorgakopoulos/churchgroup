<?php require_once '../config/base.php'; ?>
<script src="<?php echo ABSPATH ?>assets/ckeditor/ckeditor.js"></script>
<?php
$query = "SELECT * FROM `posts` WHERE `type`='videos' AND `id`=".mysql_real_escape_string($_GET['post_id'])."";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run);
?>

<h1 class="section-title"><i class="fa fa-edit"></i> Επεξεργασία Βίντεο</h1>
<div id="msg" style="text-align: center; margin: 20px 0;"></div>

<form>
    <div class="group">
        <input type="text" name="title" id="title" value="<?php echo $row['title'] ?>" required>
        <span class="bar"></span>
        <label>Τίτλος</label>
    </div>

    <div class="group">
        <input type="text" name="descr" id="descr" value="<?php echo $row['descr'] ?>" placeholder="Περιγραφή (προαιρετική)">
        <span class="bar"></span>
    </div>

    <div class="group">
        <input type="text" name="url" id="url" placeholder="Video embed URL" value="add new URL here">
        <span class="bar"></span>
    </div>

    <br>
        <input type="button" onclick="update_video(<?php echo $row['id'] ?>)" value="Τροποποίηση" class="btn btn-default">

</form>

<script>
    CKEDITOR.replace( 'content' );
    function update_video(id) {
        document.getElementById('msg').innerHTML = '<div style="text-align: center; font-size: 2.5rem; margin-bottom: 1rem;"><i class="fa fa-spinner fa-pulse"></i></div>';

        title1 = $('#title').val();
        descr1 = $('#descr').val();
        content1 = $('#url').val();

        $.ajax({
            type: "POST",
            url: "../php_scripts/update_video.php",
            data: { post_id : id, title : title1, descr : descr1, content : content1},
            success: function(data){
                document.getElementById('msg').innerText = data;
            }
        });
    }
</script>