var kominite = {};

kominite.slider = (function(){
  function initSlider(sliderContainer) {
    $(sliderContainer).slick({
      infinite: true,
      vertical: true,
      speed: 800,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
        {
          breakpoint: 1350,
          settings: {
            vertical: false
          }
        },
        {
          breakpoint: 768,
          settings: {
            vertical: false,
            slidesToShow: 2
          }
        },
        {
          breakpoint: 500,
          settings: {
            vertical: false,
            slidesToShow: 1
          }
        }
      ]
    }).removeClass('hide');
  }

  return {
    initSlider: initSlider
  }
}());
$(function() {
  kominite.slider.initSlider('.products-slider');
});