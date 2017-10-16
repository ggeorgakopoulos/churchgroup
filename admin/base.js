$(document).ready(function(){
    $('.hamburger').click(function(){
       $('.side-nav').toggleClass('visible');
       $('.fullpage-darkener').toggleClass('visible');
    });


    $('.nav-menu-user').click(function(){
        $('.nav-menu-user-dropdown').toggleClass('open');
        $(this).toggleClass('ripple-effect');
    });

    $('.side-nav-heading').click(function(){
        $(this).siblings().toggleClass('open');
        $(this).children('i.changing-fa').toggleClass('fa-caret-down').toggleClass('fa-caret-right');
    });

});