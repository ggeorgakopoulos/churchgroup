<?php require_once '../config/base.php';
?>


<h1 class="section-title"><i class="fa fa-align-center"></i> Ανάρτηση Εικόνων</h1>
<div id="msg" style="text-align: center; margin: 20px 0;"></div>

<form enctype="multipart/form-data" action="../php_scripts/_upload_img" method="post">
    <div class="group">
        <input type="text" name="title" id="title" required>
        <span class="bar"></span>
        <label>Τίτλος κατηγορίας</label>
    </div>

    <div class="group">
        <input type="text" name="descr" id="descr" required>
        <span class="bar"></span>
        <label>Περιγραφή</label>
    </div>

    <p>Μπορείς να ανεβάσεις το μέγιστο 20 φωτογραφίες για μια κατηγορία</p>
    <input type="file" name="files[]" id="files"  multiple>
    <br>
    <br>
    <input type="submit" id="submit" name="submit" value="Ανάρτηση φωτογραφιών" class="btn btn-default">
</form>
