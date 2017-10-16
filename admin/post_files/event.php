<?php require_once '../config/base.php'; ?>
<script src="<?php echo ABSPATH ?>assets/ckeditor/ckeditor.js"></script>

<h1 class="section-title"><i class="fa fa-align-center"></i> Δημοσίευση Ανακοίνωσης</h1>
<div id="msg" style="text-align: center; margin: 20px 0;"></div>

<form>
    <div class="group">
        <input type="text" name="title" id="title" required>
        <span class="bar"></span>
        <label>Τίτλος</label>
    </div>

    <div class="group">
        <input type="text" name="descr" id="descr" required>
        <span class="bar"></span>
        <label>Περιγραφή</label>
    </div>

    <textarea  id="content" cols="30" rows="10" required></textarea>

    <br>
    <input type="checkbox" name="pinned" id="pinned">
    <label for="pinned">Καρφίτσωμα δημοσίευσης</label>
    <br><br>
    <input type="button" onclick="post_event()" value="Δημοσίευση" class="btn btn-default">
        
</form>

<script>
    CKEDITOR.replace( 'content' );
    function post_event() {
        document.getElementById('msg').innerHTML = '<div style="text-align: center; font-size: 2.5rem; margin-bottom: 1rem;"><i class="fa fa-spinner fa-pulse"></i></div>';

        title1 = $('#title').val();
        descr1 = $('#descr').val();
        check1 = $('#pinned').val();
        content1 = window.frames[0].document.body.innerHTML;

        $.ajax({
            type: "POST",
            url: "../php_scripts/post_event.php",
            data: { title : title1, descr : descr1, content : content1, pinned : check1},
            success: function(data){
               document.getElementById('msg').innerText = data;
            }
        });
    }
</script>
