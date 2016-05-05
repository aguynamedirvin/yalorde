<?= snippet('header') ?>


    <!--<section class="promos">

        <?php
            $i = 0;

            foreach ($top_cats as $cat):
                $cat = $index->findByURI($cat);
                $i++;
        ?>
            <a href="<?= $cat->url() ?>">
                <div class="promo <?= e($i % 2, 'promo--lg', 'promo--sm') ?>">
                    <?php

                        if ( $cat->hasImages() ) {
                            if ( $cat->featured_image()->isNotEmpty() ) {
                                // Get featured image
                                $image = $cat->featured_image();
                                $image = $cat->file($image)->dir() . '/' . $image;
                            } else {
                                // Get the first image
                                $image = $cat->images()->sortBy('sort', 'asc')->first();
                            }

                            $thumb   = thumb($image, array('width' => 810, 'height' => 400));

                            echo '<img src="' . $thumb->url() . '" alt="' . $cat->title()->html() . '" />';
                        }

                    ?>
                    <div class="promo__meta">
                        <h2><?= $cat->title()->html() ?></h2>
                        <a class="btn" href="products.html"><?= l::get('shop') . ' ' . $cat->title()->html() ?></a>
                    </div>
                </div>
            </a>
        <?php endforeach ?>-->

        <section class="promos">

            <a href="<?= page('shop/dresses')->url() ?>">
                <div class="promo  promo--lg">
                    <img src="assets/images/examples/dresses.jpg" alt="Dresses" />
                    <div class="promo__meta">
                        <h2>Dresses</h2>
                        <a class="btn" href="<?= page('shop/dresses')->url() ?>">Shop Dresses</a>
                    </div>
                </div>
            </a>

            <a href="<?= page('shop/jewelry')->url() ?>">
                <div class="promo  promo--sm">
                    <img src="assets/images/examples/jewelry.jpg" alt="Jewelry" />
                    <div class="promo__meta">
                        <h2>Jewelry</h2>
                        <a class="btn" href="<?= page('shop/jewelry')->url() ?>">Shop Jewelry</a>
                    </div>
                </div>
            </a>

            <a href="<?= page('shop/accessories')->url() ?>">
                <div class="promo  promo--sm">
                    <img src="assets/images/examples/accessories.jpg" alt="Accessories" />
                    <div class="promo__meta">
                        <h2>Accessories</h2>
                        <a class="btn" href="<?= page('shop/accessories')->url() ?>">Shop Accessories</a>
                    </div>
                </div>
            </a>

            <a href="<?= page('shop/dresses')->url() ?>">
                <div class="promo  promo--lg">
                    <img src="assets/images/examples/collections.jpg" alt="Collections" />
                    <div class="promo__meta">
                        <h2>Collections</h2>
                        <a class="btn" href="<?= page('shop/dresses')->url() ?>">Shop Collections</a>
                    </div>
                </div>
            </a>

        </section>

    <main>

        <!-- New Arrivals -->
        <section class="section">
            <div class="wrap">

                <div class="section__meta">
                    <h1 class="section__title"><?= l::get('new-arrivals') ?></h1>
                    <p class="section__desc"><?= l::get('stay-ahead-of-fashion') ?></p>
                </div>

                <div class="product__list">
                    <?= snippet('list.product', ['products' => $arrivals]) ?>
                </div>

            </div>
        </section>


        <!-- Product Categories -->
        <section class="section  section__product-cats">
            <div class="wrap">

                <?php foreach ($bottom_cats as $cat): ?>
                <div class="product-cat">
                    <?php
                        $cat = $index->findByURI($cat);
                        $products = page($cat)->index()->visible()->filterBy('template', 'product')->limit(3);
                    ?>
                    <h3 class="product-cat__title"><?= $cat->title() ?></h3>
                    <div class="product__list--vertical">

                        <?= snippet('list.product', ['products' => $products, 'smallthumb' => true]) ?>

                    </div>
                    <a class="section__view-more" href="<?= $cat->url() ?>"><?= l::get('shop') . ' ' . $cat->title() ?></a>
                </div>
                <?php endforeach ?>

            </div>
        </section>


        <!-- Map -->
        <section class="section">
            <div class="section__meta">
                <h1 class="section__title"><?= l::get('upgrade-wardrobe') ?></h1>
                <p class="section__desc"><?= l::get('visit-us-and-transform') ?></p>
            </div>

            <?= snippet('map') ?>

        </section>

    </main>


<?= snippet('footer') ?>
