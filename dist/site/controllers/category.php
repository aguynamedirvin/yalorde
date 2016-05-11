<?php

return function($site, $pages, $page) {

    $category = $page;

    // Fetch the products
    $products = $category->index()->visible()->filterBy('template', 'product');

    // Get the subcategories
    $subcategories = $category->children()->visible();
    
    // Get featured image
    if ( $category->featured_image()->isNotEmpty() ) {
        // Get featured image
        $image = $category->featured_image();
        $image = $category->files()->find($image);
        
        // Create the image
        $header_bg = thumb($image, ['width' => 1000, 'height' => 200, 'crop' => true, 'upscale' => true, 'blur' => true, 'quality' => 70]);
    }
    
    // Filter by occasion
    $filter = get('filter');

    if ( $filter != '' ) {
        // Replace spaces with dashes
        $filter = str_replace(' ', '-', $filter);
        
        $filter = $category->children()->findByURI(strtolower($filter));
        $products = $filter->children()->visible()->filterBy('template', 'product');
    }

    // Add pagination
    $products = $products->paginate(16);
    $pagination = $products->pagination();

    return compact('category', 'products', 'subcategories', 'pagination', 'header_bg');

};
