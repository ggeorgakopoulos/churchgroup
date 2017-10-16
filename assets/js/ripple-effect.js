//Ripple effect
$('body').on( 'click', '.ripple-effect', function(e){
    var the_dom_limit;

    // Cache the selector
    var the_dom = $(this);

    // Get the limit for ripple effect
    var limit = the_dom.attr( 'data-ripple-limit' );

    // Get custom color for ripple effect
    var color = the_dom.attr( 'data-ripple-color' );
    if( typeof color == 'undefined' ){
        color = 'rgba( 255, 255, 255, 0.3 )';
    }

    // Get ripple radius
    var radius = the_dom.attr( 'data-ripple-wrap-radius' );
    if( typeof radius == 'undefined' ){
        radius = 0;
    }

    // Get the clicked element and the click positions
    if( typeof limit == 'undefined' ){
        the_dom_limit = the_dom;
    } else {
        the_dom_limit = the_dom.closest( limit );
    }

    var the_dom_offset = the_dom_limit.offset();
    var click_x = e.pageX;
    var click_y = e.pageY;

    var the_dom_width = the_dom_limit.outerWidth();
    var the_dom_height = the_dom_limit.outerHeight();

    var ripple_effect_wrap = $('<span class="ripple-effect-wrap"></span>');
    ripple_effect_wrap.css({
        'width' 		: the_dom_width,
        'height'		: the_dom_height,
        'position' 		: 'absolute',
        'top'			: the_dom_offset.top,
        'left'	 		: the_dom_offset.left,
        'z-index' 		: 100,
        'overflow' 		: 'hidden',
        'background-clip'	: 'padding-box',
        '-webkit-border-radius' : radius,
        'border-radius'		: radius
    });


// Append the ripple effect wrap
    ripple_effect_wrap.appendTo('body');

    // Determine the position of the click relative to the clicked element
    var click_x_ripple = click_x - the_dom_offset.left;
    var click_y_ripple = click_y - the_dom_offset.top;
    var circular_width = 300;

// Draw the ripple effect
    var ripple = $('<span class="ripple"></span>');
    ripple.css({
        'width' 						: circular_width,
        'height'						: circular_width,
        'background'					: color,
        'position'						: 'absolute',
        'top'							: click_y_ripple - ( circular_width / 2 ),
        'left'							: click_x_ripple - ( circular_width / 2 ),
        'content'						: '',
        'background-clip' 				: 'padding-box',
        '-webkit-border-radius'     	: '50%',
        'border-radius'             	: '50%',
        '-webkit-animation-name'		: 'ripple-animation',
        'animation-name'              	: 'ripple-animation',
        '-webkit-animation-duration'  	: '2s',
        'animation-duration'          	: '2s',
        '-webkit-animation-fill-mode' 	: 'both',
        'animation-fill-mode'         	: 'both'
    });
    $('.ripple-effect-wrap:last').append( ripple );


    setTimeout( function(){
        ripple_effect_wrap.fadeOut(function(){
            $(this).remove();
        });
    }, 1000 );



});


