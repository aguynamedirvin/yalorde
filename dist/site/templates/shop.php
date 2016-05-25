<?= snippet('header') ?>


    <div class="shop__header" style="background-image: url('<?= $site->url() ?>/assets/images/examples/dresses.jpg')">
        <h1 class="page__title">
            <?php
                if ( $products->count() ) {
                    if ( $tag ) {
                        echo l::get('tagged-with') . ': \'' . $tag . '\'';
                    } else if ( $query ) {
                        echo l::get('results-for') . ': \'' . $query . '\'';
                    } else {
                        echo $category->title()->html();
                    }
                } else {
                    echo l::get('no-results');
                }
            ?>
        </h1>
    </div>


    <main class="wrap  shop">


        <div class="product__list">
            <?= snippet('product.list', ['products' => $products]) ?>
        </div>


        <?= snippet('pagination', ['pagination' => $pagination]) ?>


    </main>

<?= snippet('footer') ?>
