<?= snippet('header') ?>

    <?php
        
        if ( $query = get('query') ) {
            $results = page('shop')->index()->visible()->filterBy('template', 'product')->search($query, 'title|sku|tags');
        }
    
    ?>

    <div class="shop__header">
        <h1 class="page__title">Search results for '<?= $query ?>'</h1>
    </div>

    <main class="wrap  shop">
        
        <?php if ( $results != null ): ?>
        <div class="product__list">
            <?= snippet('list.product', ['products' => $results]); ?>
        </div>
        <?php endif ?>

    </main>



<?= snippet('footer') ?>
