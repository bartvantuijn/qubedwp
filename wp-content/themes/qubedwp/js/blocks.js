$(document).ready(function(){

    //Fix block distance
    $($('*[data-block]:not(".block-slider")')).each(function() {
        if( $(this).data('block-background') && ($(this).data('block-background') === $(this).next('*[data-block]').data('block-background')) ) {
            $(this).addClass('pt-5');
        } else {
            $(this).addClass('py-5');
        }
    });

});