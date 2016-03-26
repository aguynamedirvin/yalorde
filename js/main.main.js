$(document).ready(function(){

    /**
     * Initiliaze Slick sliders
     */

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


    /**
     * Fix Google map zooming while scrolling the page
     */

    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function (event) {
        var that = $(this);

        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }

    var onMapClickHandler = function (event) {
        var that = $(this);

        // Disable the click handler until the user leaves the map area
        that.off('click', onMapClickHandler);

        // Enable scrolling zoom
        that.find('iframe').css("pointer-events", "auto");

        // Handle the mouse leave event
        that.on('mouseleave', onMapMouseleaveHandler);
    }

    // Enable map zooming with mouse scroll when the user clicks the map
    $('.location--map').on('click', onMapClickHandler);

});
