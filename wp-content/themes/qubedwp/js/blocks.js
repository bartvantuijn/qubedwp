$(document).ready(function(){

    //Change block distance
    $($('*[data-block]:not(.block-slider, .block-video[data-block-position="center"])')).each(function() {
        //If the block background is the same as next block background
        if( $(this).data('block-background') && ($(this).data('block-background') === $(this).next('*[data-block]').data('block-background')) ) {
            $(this).addClass('pt-5');
        } else {
            $(this).addClass('py-5');
        }
    });

});