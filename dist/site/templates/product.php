<?= snippet('header') ?>

    <main class="wrap">

        <article class="product  product-single" itemscope itemtype="http://schema.org/Product">

            <figure class="product__images">
                <?php if ( $product->hasImages() ): ?>
                    <div class="slider  product__slider">
                        <?php foreach ( $product->images() as $image ): ?>
                            <img src="<?= thumb($image, ['width' => 430, 'height' => 625])->url() ?>">
                        <?php endforeach ?>
                    </div>

                    <div class="product__thumbnails">
                        <?php foreach ( $product->images() as $image ): ?>
                            <img src="<?= thumb($image, ['width' =>  150, 'height' => 210])->url() ?>">
                        <?php endforeach ?>
                    </div>
                <?php else: ?>
                    <?php $fallback = $site->images()->find('fallback.jpg'); ?>
                    <img src="<?= thumb($fallback, ['width' => 430, 'height' => 625])->url() ?>">
                <?php endif ?>
            </figure>

            <div class="product__details">
                <header class="product__section">

                    <?= snippet('breadcrumb') ?>

                    <h1 class="product__title" itemprop="name"><?= $product->title()->html() ?></h1>

                    <div class="product__price" itemscope itemtype="http://schema.org/Offer">
                        <?= formatPrice( $product->price(), $product->saleprice() ) ?>
                    </div>
                </header>

                <div class="product__section  product__social-share">
                    <h3><?= l::get('share-with-friends') ?></h3>
                    <ul class="social-icons  social-icons--color">
                        <li><a href="#"><i class="fa  fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa  fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa  fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa  fa-google-plus"></i></a></li>
                    </ul>
                </div>

                <div class="product__section  product__by-phone">
                    <h3><?= l::get('order-by-phone') ?></h3>
                    <p><a href="tel:+1<?= formatPhone(page('contact')->phone()) ?>"><?= l::get('call-us') . ' ' . page('contact')->phone()->html() ?></a></p>
                </div>

                <?php if ( $product->bulkdiscount()->isTrue() ): ?>
                <div class="product__section  product__pricing">
                    <h3><?= l::get('more-than-one') ?></h3>
                    <table class="price-table">
                        <tr>
                            <th><?= l::get('qty') ?></th>
                            <th><?= l::get('total') ?></th>
                            <th><?= l::get('savings') ?></th>
                        </tr>

                        <?php
                            if ( $product->saleprice()->isNotEmpty() ) {
                                $price = $product->saleprice()->float();
                            } else {
                                $price = $product->price()->float();
                            }

                            $qty = [1, 3, 5, 7, 9];
                        ?>

                        <?php foreach($qty as $i): ?>
                            <tr>
                                <?php
                                    $original = $price * $i;

                                    // We could use `**` instead of pow() but backwards compability.
                                    $cost = $price * ( pow($i, 0.95) );
                                    $savings = $original - $cost;

                                    // Format/Round numbers
                                    $cost = number_format($cost);
                                    $savings = number_format($savings);
                                ?>
                                <td><?= $i ?></td>
                                <td>$<?= $cost ?></td>
                                <td>$<?= $savings ?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div> <!-- /. bulk discount -->
                <?php endif ?>

                <div class="product__section  product__info">
                    <h3>Info</h3>
                    <ul>
                        <?php if ( $product->style()->isNotEmpty() ): ?>
                        <li><?= l::get('style') ?>: <?= $product->style()->html() ?></li>
                        <?php endif ?>

                        <?php if ( $tags ): ?>
                        <li><?= l::get('tags') ?>:
                            <?php foreach ( $tags as $tag ): ?>
                                <a href="<?= page('shop')->url() . '/tag:' . $tag ?>"><?= $tag->html() ?></a><?= e($tag != end($tags), ',') ?>
                            <?php endforeach ?>
                        </li>
                        <?php endif ?>

                        <li class="product__anticipation"><?= l::get('anticipation') ?></li>
                    </ul>
                </div>
            </div>

        </article><!-- /. product-single -->

        
        <?php if ( $related->count() ): ?>
        <!-- Related products -->
        <div class="section  product__list">
            <div class="section__meta">
                <h3 class="section__title"><?= l::get('related-products') ?></h3>

                <?= snippet('product.list', ['products' => $related]) ?>
            </div>
        </div>
        <?php endif ?>


    </main>

<?= snippet('footer') ?>
