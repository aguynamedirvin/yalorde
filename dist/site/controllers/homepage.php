<?php


return function($site, $pages, $page) {

    // All products
    $products = page('shop')->index()->visible()->filterBy('template', 'product');

    $arrivals = $products->limit(8); // Latest arrivals
    $quince = $products->filterBy('category', 'quinceanera', ',')->limit(4);
    $bridesmaid = $products->filterBy('category', 'bridesmaid', ',')->limit(4);

    $index = $site->index();

    $bottom_cats = $page->bottom_categories()->split();
    $top_cats = $page->top_categories()->split();


    // Pass variables
    return compact('arrivals', 'quince', 'bridesmaid', 'index', 'top_cats', 'bottom_cats');

};
