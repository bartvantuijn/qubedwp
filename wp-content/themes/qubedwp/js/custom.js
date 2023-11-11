AOS.init();

$(window).on('load', function() {

    $('#loader').delay(100).fadeOut(250);
    AOS.refresh();

});

$(document).ready(function(){

    //Tooltips
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    //Popup
    $(function () {
        $('#popup').modal('show');
    });

    //Toasts
    $(function () {
        $('.toast').toast('show');
    });

    //Alerts
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

    //Navbar
    $(function() {
        $(document).click(function (event) {
            if (!$(event.target).is('.navbar-collapse *')) {
                $('.navbar-collapse').collapse('hide');
            }
        });
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

function setCookie(name, value, days, element = null, url = null) {
    let d = new Date();
    d.setTime(d.getTime() + (days*24*60*60*1000));
    let expires = "expires="+d.toUTCString();
    document.cookie = name + "=" + value + "; " + expires;

    if (element !== null) {
        element.fadeOut();
    }

    if (url !== null) {
        location.href = url;
    }
}