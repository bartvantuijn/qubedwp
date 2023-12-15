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

            //Bootstrap
            $('.input-text').addClass('form-control');
            $('.orderby').addClass('form-select');
            $('.variations select').addClass('form-select');

            //Scroll
            if ($('body.woocommerce.archive')[0]) {
                $('html, body').animate({
                    scrollTop: $('#primary').offset().top -50
                });
            }
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

});

function setCookie(name, value, days, element = null, url = null) {
    let d = new Date();
    d.setTime(d.getTime() + (days*24*60*60*1000));
    let expires = "expires="+d.toUTCString();
    document.cookie = name + "=" + value + "; " + expires + "; path=/";

    if (element !== null) {
        element.remove();
    }

    if (url !== null) {
        location.href = url;
    }
}