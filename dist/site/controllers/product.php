<?php

return function($site, $pages, $page) {
    
    $product = $page;
    
    
    // Get the parent of the product & then get the parent of the parent
    $parent = $page->parent()->parent();
    
    // Fetch the products
    $children = page($parent)->index()->visible()->filterBy('template', 'product');
    $related = $children->not($page)->shuffle()->limit(4);
    
    
    // Pass variables
    return compact('product', 'related');

};