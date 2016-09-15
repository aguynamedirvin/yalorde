<?= snippet('header') ?>

    <div class="shop__header" style="background-image: url('assets/images/examples/dresses.jpg')">
        <div class="wrap">
            <h1 class="page__title"><?= $category->title()->html() ?></h1>
        </div>
    </div>


    <main class="wrap  shop">

        Showing <?= $products->count() ?> of <?= $product_count ?> results

        <div class="product__list">
            <?= snippet('product.list', ['products' => $products]) ?>
        </div>

        <?= snippet('pagination', ['pagination' => $pagination]) ?>

    </main>


<?= snippet('footer') ?>
