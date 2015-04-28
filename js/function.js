jQuery(document).ready(function(){
    jQuery(".menu-icon").click(function(){
    jQuery(".action-menu").toggleClass("active");
});

jQuery("#sticker").sticky({topSpacing:68});

jQuery(function() {
    jQuery(".preview").linkpreview({
    });
    jQuery(".preview2").linkpreview({
        previewContainer: "#preview-container2",
        refreshButton: "#refresh-button",
        previewContainerClass: "row-fluid",
        errorMessage: "Invalid URL",
        preProcess: function() {
            console.log("preProcess");
        },
        onSuccess: function() {
            console.log("onSuccess");
        },
        onError: function() {
            console.log("onError");
        },
        onComplete: function() {
            console.log("onComplete");
        }
    });
});

jQuery('.slider').slick({
    infinite: true,
    autoplay: true,
    arrows: true,
    autoplaySpeed:5000,
    speed: 500,
    fade: true,
    slide: 'div',
    cssEase: 'linear',
    adaptiveHeight: true,
  });
  
;( function( jQuery ) {

    jQuery( '.swipebox' ).swipebox( {
    hideBarsDelay : 50000,
    loopAtEnd: true

    } );

} )( jQuery );


});