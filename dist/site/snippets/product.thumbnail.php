<?php

    // Get the product image
    if ( $product->hasImages() ) {

        if ( $product->featured_image()->isNotEmpty() ) {
            // Get featured image
            $image = $product->featured_image();
            $image = $product->file($image)->dir() . '/' . $image;
        } else {
            // Get the first image
            $image = $product->images()->sortBy('sort', 'asc')->first();
        }

    } else {
        // Get fallback image
        $image =  $site->images()->find('fallback.jpg');

    }

    // Specify default image width & height
    if ( !isset($width) ) {
        $width = 270;
    }
    if ( !isset($height) ) {
        $height = 400;
    }

    // Regular thumb
    $thumb = thumb($image, array('width' => $width, 'height' => $height));
    // Retina thumb
    $thumbx2 = thumb($image, array('width' => $width * 1.5, 'height' => $height * 1.5));


    $src = $thumb->url() . ' ' . $width . 'w';
    $src2 = $thumbx2->url() . ' ' . $width * 1.5 . 'w';

    $srcset = $src . ' ' . $src2;

?>

<img property="image" content="<?= $thumb->url() ?>" src="<?= $thumb->url() ?>" srcset="<?= $srcset ?>" title="<?= $product->title() ?>" width="100%">
