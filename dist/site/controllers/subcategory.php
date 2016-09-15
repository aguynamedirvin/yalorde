<?php

return function($site, $pages, $page) {

    $category = $page;

    // Fetch the products
    $parent = $category->parent();
    $products = $parent->index()->visible()->filterBy('template', 'product')->filterBy('category', $page->uid(), ',');

    // Get total prodict result count
    $product_count = $products->count();

    // Add pagination
    $products = $products->paginate(16);
    $pagination = $products->pagination();

    return compact('category', 'products', 'product_count', 'pagination');

};
