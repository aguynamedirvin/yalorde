<?php

return function($site, $pages, $page) {
    
    $results = [];

    if ( $query = get('query') ) {
        $results = page('shop')->index()->visible()->filterBy('template', 'product')->search($query, 'title|sku|tags');
    }
    
    return compact('query', 'results');
    
};