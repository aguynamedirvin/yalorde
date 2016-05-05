<?php

return function($site, $pages, $page) {
  
    $category = $page;
    
    // Fetch the products
    $products = $category->index()->visible()->filterBy('template', 'product');
    
    // Get total prodict result count 
    $product_count = $products->count();
    
    // Add pagination
    $pagination = $products->paginate(16)->pagination();
    
    
    // Filter by occasion
    $occasion = get('occasion');
    
    if ( $occasion != '' ) {
        $test = page($category . '/' . strtolower($occasion));
        $products = $test->children()->visible()->filterBy('template', 'product');
    }
    
    
    return compact('category', 'products', 'product_count', 'pagination');
  
};