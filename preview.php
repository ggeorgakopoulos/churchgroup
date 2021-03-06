<?php require_once 'config/base.php' ?>
<!DOCTYPE html>

<html>
	<head>

		<title>Προβολή εικόνων</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

		<meta name="author" content="Giorgos Georgakopoulos">
		<meta name="description" content="**">
		<meta name="keywords" content="Χριστιανισμός, ορθοδοξία">
		<meta name="robots" content="index,follow">
		<meta name="googlebot" content="index,follow">
		<meta name="revisit-after" content="3 hours">

		<link rel="stylesheet" href="<?php echo ABSPATH ?>assets/styles/main.css">
		<link rel="stylesheet" href="<?php echo ABSPATH ?>assets/gallery/css/supersized.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo ABSPATH ?>assets/gallery/theme/supersized.shutter.css" type="text/css" media="screen" />

		<script src="<?php echo ABSPATH ?>assets/js/libs/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="<?php echo ABSPATH ?>assets/gallery/js/jquery.easing.min.js"></script>
		
		<script type="text/javascript" src="<?php echo ABSPATH ?>assets/gallery/js/supersized.3.2.7.min.js"></script>
		<script type="text/javascript" src="<?php echo ABSPATH ?>assets/gallery/theme/supersized.shutter.min.js"></script>

		<?php $id = mysql_real_escape_string($_GET['id']); ?>

		<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slideshow               :   1,			// Slideshow on/off
					autoplay				:	0,			// Slideshow starts playing automatically
					start_slide             :   1,			// Start slide (0 is random)
					stop_loop				:	0,			// Pauses slideshow on last slide
					random					: 	0,			// Randomize slide order (Ignores start slide)
					slide_interval          :   4000,		// Length between transitions
					transition              :   6, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	500,		// Speed of transition
					new_window				:	0,			// Image links open in new window/tab
					pause_hover             :   0,			// Pause slideshow on hover
					keyboard_nav            :   1,			// Keyboard navigation on/off
					performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,			// Disables image dragging and right click with Javascript
															   
					// Size & Position						   
					min_width		        :   0,			// Min width allowed (in pixels)
					min_height		        :   0,			// Min height allowed (in pixels)
					vertical_center         :   1,			// Vertically center background
					horizontal_center       :   1,			// Horizontally center background
					fit_always				:	1,			// Image will never exceed browser width or height (Ignores min. dimensions)
					fit_portrait         	:   1,			// Portrait images will not exceed browser height
					fit_landscape			:   0,			// Landscape images will not exceed browser width
															   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					thumb_links				:	1,			// Individual thumb links for each slide
					thumbnail_navigation    :   1,			// Thumbnail navigation
					slides 					:  	[			// Slideshow Images

                        <?php
                             $query = "SELECT * FROM `images` WHERE `category_id`='$id'";
                             $query_run = mysql_query($query);

                             while( $row = mysql_fetch_assoc($query_run)) { ?>

                                {image : '<?php echo ABSPATH.$row['img_path'] ?>', title : 'Εικόνες', thumb : '<?php echo ABSPATH.$row['img_path'] ?>', url : '#'},

                        <?php } ?>
                    ],
					// Theme Options			   
					progress_bar			:	1,			// Timer for each slide
					mouse_scrub				:	0
					
				});
		    });
		    
		</script>
		
	</head>
<body>
	<!--Thumbnail Navigation-->
    <a href="<?php echo ABSPATH ?>images" class="back-to-site"
        style="
        position: fixed;
        display: block;
        top: 0;
        left: 0;
        background-color: #fff;
        padding: 10px;
        font-size: 20px;
        ">
        Go back
    </a>

	<div id="prevthumb"></div>
	<div id="nextthumb"></div>
	
	<!--Arrow Navigation-->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>
	
	<div id="thumb-tray" class="load-item">
		<div id="thumb-back"></div>
		<div id="thumb-forward"></div>
	</div>
	
	<!--Time Bar-->
	<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>
	
	<!--Control Bar-->
	<div id="controls-wrapper" class="load-item">
		<div id="controls">
		
			<!--Slide counter-->
			<div id="slidecounter">
				<span class="slidenumber"></span> / <span class="totalslides"></span>
			</div>
			
			<!--Slide captions displayed here-->
			<div id="slidecaption"></div>
			
			<!--Thumb Tray button-->
			<a id="tray-button"><img id="tray-arrow" src="<?php echo ABSPATH ?>assets/gallery/img/button-tray-up.png"/></a>
			
			<!--Navigation-->
			<ul id="slide-list"></ul>
			
		</div>
	</div>

</body>
</html>
