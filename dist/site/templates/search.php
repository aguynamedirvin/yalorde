<?= snippet('header') ?>

    <div class="shop__header">
        <div class="wrap">
            <h1 class="page__title">
                <?= e( !empty($results) && $results->count() > 0, l::get('search-results'), l::get('no-search-results') ) ?> '<?= $query ?>'
            </h1>
        </div>
    </div>
    
    <?php if ( $results ): ?>
    <main class="wrap  shop">

        <div class="product__list">
            <?= snippet('list.product', ['products' => $results]); ?>
        </div>
        
    </main>
    <?php endif ?>

<?= snippet('footer') ?>
