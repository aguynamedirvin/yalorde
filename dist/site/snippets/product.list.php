<?php if( count($products) || $products->count() ): ?>
    <?php foreach ($products as $product): ?>
        <div class="product  product-item">
            <figure class="product__image">
                <a href="<?= $product->url() ?>">
                    <?php

                        if ( isset($smallthumb) && $smallthumb == true ) {
                            snippet('product.thumbnail', array('product' => $product, 'width' => 105, 'height' => 110));
                        } else {
                            snippet('product.thumbnail', array('product' => $product));
                        }

                    ?>
                </a>
            </figure>
            <div class="product__meta">
                <h3 class="product__title" property="name"><a href="<?= $product->url() ?>"><?= $product->title()->excerpt(25) ?></a></h3>
                <div class="product__price">
                    <?= formatPrice( $product->price(), $product->saleprice() ) ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>
