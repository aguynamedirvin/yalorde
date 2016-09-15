<?php

return function($site, $pages, $page) {

    $product = $page;

    $categories = $product->categories()->split();

    // Get the parent of the product & then get the parent of the parent
    $parent = $page->parent();

    // Related products
    $related = $parent->index()->visible()->filterBy('template', 'product');
    $related = $related->not($page)->shuffle()->limit(4);
    

    // Pass variables
    return compact('product', 'related');

};
