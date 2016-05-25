$(document).ready(function(){


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



/**
 * Instant search results
 *
 */
var input           = $('.search__input');
var searchResults   = $('.search__results');

input.on('keyup', function(e) {
    // I check if the length in the input is more than 3 characters
    if (input.val().length > 3) {

        $.ajax({
            // build the url
            url: document.location.origin + '/dist/search/' + encodeURIComponent(input.val()),
            context: searchResults
        }).done(function(data) {

            console.log('Url: ' + document.location.origin + "/dist/search/" + encodeURIComponent(input.val()) + "");

            // convert the data to objects, console.log this to see
            // how the object is build and which keys you can use
            var results = JSON.parse(data);

            // Flush the container
            searchResults.html('');

            // loop trough the objects in results and display them
            jQuery.each(results, function(index, object) {

                // Display the container
                searchResults.css('display', 'block');

                var string = '<li><a href="' + object.url + '">' + object.content.title + '</a></li>';

                // Append the results to the container
                searchResults.append(string);
            });
        });
    } else {
        // If there are less than 3 or 0 characters in the input, flush the container
        searchResults.html('');

        // Hide the container
        searchResults.css('display', 'none');
    }
});
