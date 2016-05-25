<?php

return function($site, $pages, $page) {

    $category = $page;

    // Fetch the products
    $products = $category->index()->visible()->filterBy('template', 'product');

    // Filter by tag
    $tag = param('tag');
    if ( $tag ) {
        $products = $products->filterBy('tags', $tag, ',');
    }

    // Filter by search query
    $query = get('search');
    if ( $query ) {
        $products = $products->search($query, 'title|sku|tags');
    }

    // Add pagination
    $products = $products->paginate(16);
    $pagination = $products->pagination();


    return compact('category', 'products', 'pagination', 'tag', 'query');

};
