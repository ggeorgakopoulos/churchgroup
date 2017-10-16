<?php include_once 'assets/inc/header.php'; ?>

<h1 class="section-title" style="font-size: 2rem; margin-top: 0;"><i class="fa fa-youtube-play"></i> Βίντεο</h1>

<div class="latest-posts">
    <?php if(are_posts_type('videos')) : ?>
        <?php
        $query = "SELECT * FROM `posts` WHERE `type`='videos' ORDER BY `date_posted` DESC";
        $query_run = mysql_query($query);

        while ($row = mysql_fetch_assoc($query_run)) {
            ?>
            <div>
                <div class="post video-post ripple-effect" data-id="<?php echo $row['id'] ?>" tabindex="0" style="background-color: <?php echo $row['color'] ?>">
                    <h1><?php echo $row['title'] ?> (<?php echo category_to_str($row['category']) ?>)</h1>
                    <p><?php echo $row['descr'] ?></p>
                    <div class="post-date"><?php echo string_to_date($row['date_posted']) ?></div>
                    <div class="external-link"><i class="fa fa-external-link"></i></div>
                    <div class="play-button"><i class="fa fa-play"></i></div>
                </div>
                <div class="content">
                    <span class="x"><i class="fa fa-close"></i></span>
                    <div></div>
                </div>
            </div>

        <?php } ?>
    <?php else : ?>
        <p style="text-align: center;">Δεν υπάρχουν διαθέσιμα βίντεο.</p>
    <?php endif; ?>
</div>

<script>
    $('.post').click(function() {
        if (!$(this).siblings().hasClass('open')) {
            $(this).siblings().addClass('open');
        }
        cont = $(this).siblings().children('div');
        id = $(this).data('id');

        function get_videos_content(id) {
            $.ajax({
                type: "POST",
                url: "php_scripts/get_videos_content.php",
                data: { id : id },
                success: function(data){
                    cont.html(data);
                }
            });
        }

        get_videos_content(id);

    });
    $('.x').click(function(){
        var elem = $(this).parent();
        elem.removeClass('open');
    });
</script>

<script src="<?php echo ABSPATH ?>assets/js/videos.js"></script>
<?php include_once 'assets/inc/footer.php'; ?>
