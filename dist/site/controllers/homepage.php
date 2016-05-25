<?php


return function($site, $pages, $page) {
  
    // All products
    $arrivals = page('shop')->index()->visible()->filterBy('template', 'product')->limit(8);
    
    $index = $site->index();
    
    $bottom_cats = $page->bottom_categories()->split();
    $top_cats = $page->top_categories()->split();
    
    
    // Pass variables
    return compact('arrivals', 'index', 'top_cats', 'bottom_cats');
  
};