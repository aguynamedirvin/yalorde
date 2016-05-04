<?= snippet('header') ?>

    <?php

        $results = [];

        if ( $query = get('query') ) {
            $results = page('shop')->index()->visible()->filterBy('template', 'product')->search($query, 'title|sku|tags');
        }

    ?>

    <div class="shop__header">
        <div class="wrap">
            <h1 class="page__title">
                <?= e( $results->count() > 0, l::get('search-results'), l::get('no-search-results') ) ?> '<?= $query ?>'
            </h1>
        </div>
    </div>

    <main class="wrap  shop">

        <?php if ( $results ): ?>
        <div class="product__list">
            <?= snippet('list.product', ['products' => $results]); ?>
        </div>
        <?php endif ?>

    </main>



<?= snippet('footer') ?>
