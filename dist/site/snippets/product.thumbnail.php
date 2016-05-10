<?php

    // Get the product image
    if ( $product->hasImages() ) {

        if ( $product->featured_image()->isNotEmpty() ) {
            // Get featured image
            $image = $product->featured_image();
            $image = $product->files()->find($image);
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
        $width = 260;
    }
    if ( !isset($height) ) {
        $height = 400;
    }

    // Mobile thumb image width & height
    $sm_width = round($width / 1.5);
    $sm_height = round($height / 1.5);

    // Regular thumb
    $thumb = thumb($image, array('width' => $width, 'height' => $height));
    // Mobile thumb
    $thumbSM = thumb($image, array('width' => $sm_width, 'height' => $sm_height));

    /////////////////////////////////////

    $srcs = [$thumb, $thumbSM];
    $srcset = '';

    $i = 0;

    foreach ($srcs as $src) {
        $srcset .= $src->url();

        $i++;

        if ($i != count($srcs)) {
            $srcset .= ', <br />';
        }
    }

    /////////////////////////////////////


    $src = $thumb->url() . ' ' . $width . 'w';
    $src2 = $thumbSM->url() . ' ' . $sm_width . 'w';

    $srcset = $src . ', ' . $src2;

?>

<img property="image" src="<?= $thumb->url() ?>" srcset="<?= $srcset ?>" sizes="(max-width: 665) 50vw, (min-width: 667px) 25vw, (max-width: 320px) 100vw, 260px" title="<?= $product->title()->html() ?>" alt="<?= $product->title()->html() ?>" width="100%">
