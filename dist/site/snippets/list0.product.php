<?php if( count($products) || $products->count() ): ?>
    <?php foreach ($products as $product): ?>
        <div class="product  product-item">
            <figure class="product__image">
                <a href="<?= $product->url() ?>">
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

                        if ( !isset($width) ) {
                            $width = 270;
                        }
                        if ( !isset($height) ) {
                            $height = 400;
                        }

                        $thumb   = thumb($image, array('width' => $width, 'height' => $height));
                        $thumbx2 = thumb($image, array('width' => $width * 1.5, 'height' => $height * 1.5));

                    ?>
                    <img property="image" content="<?= $thumb->url() ?>" src="<?= $thumb->url() ?>" srcset="<?= $thumb->url() ?> 1x, <?= $thumbx2->url() ?> 2x" title="<?= $product->title() ?>" width="100%">

                    <?= snippet('thumbnail', array('product' => $product)) ?>
                </a>
            </figure>
            <div class="product__meta">
                <h3 class="product__title" property="name"><a href="<?= $product->url() ?>"><?= $product->title()->excerpt(25) ?></a></h3>
                <div class="product__price">
                    <?= price( $product->price(), $product->saleprice() ) ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>
