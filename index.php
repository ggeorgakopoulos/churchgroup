<?php include_once 'assets/inc/header.php'; ?>

<?php if (are_posts_type('pinned')) : ?>
<?php include_once 'php_scripts/get_pinned_post.php'; ?>
<div class="pinned">
    <div class="pin">
        <i class="fa fa-thumb-tack" title="Καρφιτσωμένη δημοσίευση απο τον <?php echo $post['user_posted'] ?>" style="float: right;"></i>
    </div>
    <h1><?php echo $post['title'] ?></h1>
    <p><?php echo $post['content'] ?></p>
    <div class="pin-date"><?php echo string_to_date($post['date_posted']) ?></div>
</div>
<?php endif; ?>


<h1 class="section-title"><i class="fa fa-retweet"></i> Δημοσιεύσεις</h1>

<div class="latest-posts">
<?php if(are_posts_type('event')) : ?>
<?php
        $query = "SELECT * FROM `posts` WHERE `type`='event' ORDER BY `date_posted` DESC";
        $query_run = mysql_query($query);

        while ($row = mysql_fetch_assoc($query_run)) {
?>

    <div>
        <div class="post ripple-effect" tabindex="0" style="background-color: <?php echo $row['color'] ?>" data-id="<?php echo $row['id'] ?>">
            <h1><?php echo $row['title'] ?></h1>
            <p><?php echo $row['descr'] ?></p>
            <div class="post-date"><?php echo string_to_date($row['date_posted']) ?></div>
            <div class="external-link"><a href="<?php echo ABSPATH ?>single_post?id=<?php echo $row['id'] ?>"></a><i class="fa fa-external-link"></i></div>
        </div>
        <div class="content">
            <span class="x" style=""><i class="fa fa-close"></i></span>
            <div>
            </div>
        </div>
    </div>

<?php } ?>
<?php else : ?>
    <p style="text-align: center;">Δεν υπάρχουν δημοσιεύσεις </p>
<?php endif; ?>
</div>

<script>
        $('.post').click(function() {
            if (!$(this).siblings().hasClass('open')) {
                $(this).siblings().addClass('open');
            }
            cont = $(this).siblings().children('div');
            id = $(this).data('id');

            function get_event_content(id) {
                $.ajax({
                    type: "POST",
                    url: "php_scripts/get_event_content.php",
                    data: { id : id },
                    success: function(data){
                        cont.html(data);
                    }
                });
            }

            get_event_content(id);

        });
        $('.x').click(function(){
            var elem = $(this).parent();
            elem.removeClass('open');
        });
</script>
<?php include_once 'assets/inc/footer.php'; ?>
