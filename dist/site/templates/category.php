<?= snippet('header') ?>


    <div class="shop__header" <?= (isset($header_bg) ? 'style="background-image: url(' . $header_bg->url() . ')"' : ''); ?> >
        <div class="wrap">
            <h1 class="page__title"><?= $category->title()->html() ?></h1>
        </div>
    </div>


    <main class="wrap  shop">


        <!-- Filter products -->
        <div class="product-filter">
            <h4>Filter</h4>

            <form id="filters" action="" method="GET">
                <select name="filter" onchange="this.form.submit()">
                    <option selected value="">All</option>
                    <?php foreach ( $subcategories as $cat ): ?>
                        <?php $cat = $cat->title()->html() ?>
                        <option <?= e(get('filter') == $cat, 'selected') ?> value="<?= $cat ?>"><?= $cat ?></option>
                    <?php endforeach ?>
                </select>
            </form>
        </div><!-- /. filter products -->


        <div class="product__list">
            <?= snippet('product.list', ['products' => $products]) ?>
        </div>


        <?= snippet('pagination', ['pagination' => $pagination]) ?>


    </main>


<?= snippet('footer') ?>
