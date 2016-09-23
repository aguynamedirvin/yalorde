<?php

return function($site, $pages, $page) {

    $category = $page;

    // Fetch the products
    $products = $category->index()->visible()->filterBy('template', 'product');

    // Get the subcategories
    $subcategories = $category->children()->filterBy('template', 'subcategory');

    // Get featured image
    if ( $category->featured_image()->isNotEmpty() ) {
        // Get featured image
        $image = $category->featured_image();
        $image = $category->files()->find($image);

        // Create the image
        $header_bg = thumb($image, ['width' => 1300, 'height' => 200, 'crop' => true, 'upscale' => true, 'blur' => true]);
    }

    // Filter by category
    $filterCat = get('filterCategory');
    if ( $filterCat != '' ) {
        // Replace spaces with dashes
        /*$filterCat = str_replace(' ', '-', $filterCat);
        $filterCat = strtolower($filterCat);

        $products = $products->filterBy('category', $filterCat, ',');*/

        go(page($filterCat));
    }

    // Filter by color
    $filterColor = get('filterColor');
    if ( $filterColor != '' ) {
        $products = $products->filterBy('colors', $filterColor, ',');
    }

    // Add pagination
    $products = $products->paginate(32);
    $pagination = $products->pagination();


    return compact('category', 'products', 'subcategories', 'pagination', 'header_bg', 'filterCat', 'filterColor');
};
