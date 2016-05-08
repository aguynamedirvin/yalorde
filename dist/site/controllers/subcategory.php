<?php

return function($site, $pages, $page) {

    $category = $page;

    // Fetch the products
    $products = $category->index()->visible()->filterBy('template', 'product');

    // Get total prodict result count
    $product_count = $products->count();

    // Add pagination
    $products = $products->paginate(16);
    $pagination = $products->pagination();

    return compact('category', 'products', 'product_count', 'pagination');

};
