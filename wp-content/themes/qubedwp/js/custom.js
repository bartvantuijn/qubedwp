AOS.init();

$(window).on('load', function() {

    $('#loading').delay(50).fadeOut(100);
    AOS.refresh();

});

$(document).ready(function(){

    //Tooltips
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    $(function () {
        $('.toast').toast('show');
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

    //WooCommerce
    $(function () {
        if ($('.woocommerce')[0]) {
            $('.input-text').addClass('form-control');
            $('.orderby').addClass('form-select');
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

});

function setCookie(name, value, days) {
    let d = new Date();
    d.setTime(d.getTime() + (days*24*60*60*1000));
    let expires = "expires="+d.toUTCString();
    document.cookie = name + "=" + value + "; " + expires;
    location.reload();
}