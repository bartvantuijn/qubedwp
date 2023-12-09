$(window).on('load', function() {

});

$(document).ready(function(){

    //If navbar is floating
    if($('nav.navbar').hasClass('floating')) {
        //Total height of #nav-wrapper
        var total = 0;
        $('#nav-wrapper .navbar').each(function(){
            total += $(this).outerHeight();
        });

        //Change margin of first slider block
        $('*[data-block-count="1"].block-slider:not(*[data-block-count="-1"] *)').css('margin-top', -total);

        //Change floating navbar brand color
        if($('*[data-block-count="1"]:not(*[data-block-count="-1"] *)').hasClass('block-slider')) {
            $('.navbar-brand').css('color','var(--bs-white)');
        }
    }

});

$(document).scroll(function () {

    //If navbar is floating
    if($('nav.navbar').hasClass('floating')) {
        //Toggle scrolled navbar classes
        $('nav.navbar.floating').toggleClass('scrolled bg-white shadow', $(this).scrollTop() > 25);

        //Change floating navbar brand on scroll
        if($('*[data-block-count="1"]:not(*[data-block-count="-1"] *)').hasClass('block-slider')) {
            if ($(this).scrollTop() > 25) {
                $('.navbar-brand').css('color','var(--bs-primary)');
            } else {
                $('.navbar-brand').css('color','var(--bs-white)');
            }
        }
    }

    //Header submenu scrollbar
    if($('#scrollbar')) {
        var percentage = $(window).scrollTop() / ($(document).height() - $(window).height()) * 100;
        $('#scrollbar').css('width', percentage + '%');
    }

});