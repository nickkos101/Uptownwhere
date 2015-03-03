$(document).ready(function(){

  $('.post-slider').slick({
    infinite: true,
    autoplay: true,
    arrows: true,
    autoplaySpeed:5000,
    speed: 500,
    fade: true,
    slide: 'div',
    cssEase: 'linear',
    adaptiveHeight: true
  });

});