<?= snippet('header') ?>


    <div class="shop__header" style="background-image: url('assets/images/examples/dresses.jpg')">
        <h1 class="page__title">
            <?= e($tag OR $query, 'Products tagged with: \'' . $tag . $query . '\'', $category->title()->html()) ?>
        </h1>
    </div>


    <main class="wrap  shop">


        <div class="product__list">
            <?= snippet('product.list', ['products' => $products]) ?>
        </div>


        <?= snippet('pagination', ['pagination' => $pagination]) ?>


    </main>

<?= snippet('footer') ?>
