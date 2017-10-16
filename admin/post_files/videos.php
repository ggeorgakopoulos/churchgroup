<?php require_once '../config/base.php'; ?>

<h1 class="section-title"><i class="fa fa-youtube-play"></i> Ανάρτηση Βίντεο</h1>
<div id="msg" style="text-align: center; margin: 20px 0;"></div>

<form>
    <div class="group">
        <input type="text" name="title" id="title" required>
        <span class="bar"></span>
        <label>Τίτλος</label>
    </div>

    <div class="group">
        <input type="text" name="descr" id="descr" placeholder="Περιγραφή (προαιρετική)">
        <span class="bar"></span>
    </div>

    <div class="group">
        <input type="text" name="iframe" id="iframe" placeholder="Video embed URL">
        <span class="bar"></span>
    </div>
    <br>
    <input type="button" onclick="post_video()" value="Δημοσίευση" class="btn btn-default">

</form>

<script>
    function post_video() {
        document.getElementById('msg').innerHTML = '<div style="text-align: center; font-size: 2.5rem; margin-bottom: 1rem;"><i class="fa fa-spinner fa-pulse"></i></div>';

        title1 = $('#title').val();
        descr1 = $('#descr').val();
        iframe1 = $('#iframe').val();

        $.ajax({
            type: "POST",
            url: "../php_scripts/post_video.php",
            data: { title : title1, descr : descr1, content : iframe1},
            success: function(data){
                document.getElementById('msg').innerText = data;
            }
        });
    }
</script>