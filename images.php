<?php include_once 'assets/inc/header.php'; ?>

    <h1 class="section-title" style="font-size: 2rem; margin-top: 0;"><i class="fa fa-images"></i> Φωτογραφίες</h1>
<p style="text-align: center">Οι παρακάτω "δημοσιεύσεις" αποτελούν κατηγορίες εικόνων, κάντε κλικ πάνω σε μια απο αυτές για να δείτε τις φωτογραφίες της κατηγορίας</p>

    <div class="latest-posts">
        <?php if(are_posts_type('images')) : ?>
            <?php
            $query = "SELECT * FROM `posts` WHERE `type`='images' ORDER BY `date_posted` DESC";
            $query_run = mysql_query($query);

            while ($row = mysql_fetch_assoc($query_run)) {
                ?>
                <a href="preview?id=<?php echo $row['id'] ?>">
                    <div class="post ripple-effect" tabindex="0" style="background-color: <?php echo $row['color'] ?>">
                        <h1><?php echo $row['title'] ?> (<?php echo category_to_str($row['category']) ?>)</h1>
                        <p><?php echo $row['descr'] ?></p>
                        <div class="post-date"><?php echo string_to_date($row['date_posted']) ?></div>
                    </div>
                </a>

            <?php } ?>
        <?php else : ?>
            <p style="text-align: center;">Δεν υπάρχουν διαθέσιμες εικόνες.</p>
        <?php endif; ?>
    </div>
    <script src="<?php echo ABSPATH ?>assets/js/videos.js"></script>
<?php include_once 'assets/inc/footer.php'; ?>