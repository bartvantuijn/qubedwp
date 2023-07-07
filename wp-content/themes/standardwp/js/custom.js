AOS.init();

$(window).on('load', function() {

    AOS.refresh();
    //$('#loading').delay(50).fadeOut(100);

});

$(document).ready(function(){

    //Tooltips
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip()
    });

    $(function () {
        $('.alert').fadeTo(2000, 500).slideUp(500, function () {
            $('.alert').slideUp(500);
        });
    });

    $(function () {
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 2000);
    });

    //Lightbox
    $(function () {
        if ($('.glightbox')[0]) {
            var lightbox = GLightbox();
        }
    });

    // $('.navbar-toggler').click(function(){
    //     $('.navbar-toggler span').toggleClass('open');
    // });
    //
    // $('.navbar-nav > li > a').click(function(){
    //     $('.navbar-collapse').collapse('hide');
    //     $('.navbar-toggler span').removeClass('open');
    // });

});

$(document).scroll(function () {

    $('.navbar.sticky-top').toggleClass('scrolled', $(this).scrollTop() > 25);

});
