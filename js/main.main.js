// Initialize Slick Sliders
$(document).ready(function(){
    // Product Slider
    $('.product__slider').slick({
        arrows: false,
        dots: true,
        asNavFor: '.product__thumbnails'
    });
    $('.product__thumbnails').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product__slider',
        focusOnSelect: true,
        vertical: true,
        responsive: [
            {
                breakpoint: 868,
                settings: {
                    slidesToShow: 3,
                    vertical: false
                }
            }
        ]
    });
});
