$(window).on('load', function() {

});

$(document).ready(function(){

    //Fix floating navbar margins
    if($('nav.navbar').hasClass('floating')) {
        var total = 0;
        $('#nav-wrapper .navbar').each(function(){
            total += $(this).outerHeight();
        });
        $('#nav-wrapper').css('margin-bottom', -total);
        $('*[data-block-count="1"]:not(".block-slider")').css('margin-top', total);
        $('*[data-block-count="-1"]').css('margin-top', -total);
    }

    //Change floating navbar brand
    if($('nav.navbar').hasClass('floating')) {
        if($('[data-block-count=1]').hasClass('block-slider')) {
            $('.navbar-brand').css('color','var(--bs-white)');
        }
    }

});

$(document).scroll(function () {

    //Toggle floating navbar background
    $('nav.navbar.floating').toggleClass('bg-white shadow', $(this).scrollTop() > 25);

    //Change floating navbar brand on scroll
    if($('nav.navbar').hasClass('floating')) {
        if($('[data-block-count=1]').hasClass('block-slider')) {
            if ($(this).scrollTop() > 25) {
                $('.navbar-brand').css('color','var(--bs-primary)');
            } else {
                $('.navbar-brand').css('color','var(--bs-white)');
            }
        }
    }

    //Header submenu scrollbar
    if($('#scrollbar')) {
        var docHeight = $(document).height();
        var winHeight = $(window).height();
        var scrollPercent = $(window).scrollTop() / (docHeight - winHeight) * 100;
        $('#scrollbar').css('width', scrollPercent + '%');
    }

});