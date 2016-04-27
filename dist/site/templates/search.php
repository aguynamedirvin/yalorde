<?= snippet('header') ?>

    <main class="wrap">
        
        
        <input type="text" class="js-search" placeholder="Searh...">
       
        <div class="ajax-container">
            Flush out
        </div>
        
    </main>
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>
        var input                       = jQuery('.js-search');
        var searchResultsContainer      = jQuery('.ajax-container');
        
        input.on('keyup', function(e) {
            
            console.log(input.val());
        
            // I check if the length in the input is more than 3 characters
            if (input.val().length > 3) {
                
                console.log('Send search query');
                
                $.ajax({
                    // build the url
                    url: "/dist/search/" + input.val() + "",
                    context: jQuery('.ajax-container')
                }).done(function(data) {
                    
                    console.log('Receive the data');
        
                    // convert the data to objects, console.log this to see 
                    // how the object is build and which keys you can use
                    var results = JSON.parse(data);
        
                    // Flush the container
                    searchResultsContainer.html('');
        
                    // loop trough the objects in results and display them
                    jQuery.each(results, function(index, object) {
                        
                        console.log('Adding results');
                        
                        var string = object.content.title;
        
                        // Append the results to the container
                        searchResultsContainer.append(string);        
                    });
                });
            } else {
                // If there are less than 3 or 0 characters in the input, flush the container
                searchResultsContainer.html('');
            }
        });
    </script>