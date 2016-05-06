<?php

return function($site, $pages, $page) {

    $category = $page;

    // Fetch the products
    $products = $category->index()->visible()->filterBy('template', 'product');

    // Get total prodict result count
    $product_count = $products->count();

    // Filter by occasion
    $occasion = get('occasion');

    if ( $occasion != '' ) {
        $test = page($category . '/' . strtolower($occasion));
        $products = $test->children()->visible()->filterBy('template', 'product');
    }

    // Add pagination
    $products = $products->paginate(16);
    $pagination = $products->pagination();

    return compact('category', 'products', 'product_count', 'pagination');

};
