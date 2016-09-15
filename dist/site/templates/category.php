<?= snippet('header') ?>


    <div class="shop__header"<?= (isset($header_bg) ? ' style="background-image: url(' . $header_bg->url() . ')"' : '') ?>>
        <div class="wrap">
            <h1 class="page__title">
                <?php
                    $title = '';

                    if ( $filterColor ) $title.= $filterColor . ' ';
                    if ( $filterCat ) $title.= $filterCat . ' ';

                    echo $title . $category->title()->html();
                ?>
            </h1>
        </div>
    </div>


    <main class="wrap  shop">

        <!-- Filter products -->
        <div class="product-filter">
            <h4>Filter</h4>

            <form id="filters" action="" method="GET">
                <label for="category">Category</label>
                <select id="category" name="filterCategory" onchange="this.form.submit()">
                    <option selected value="">All</option>
                    <?php foreach ( $subcategories as $cat ): ?>
                        <option<?= e(get('filterCategory') == $cat, ' selected') ?> value="<?= $cat->uri() ?>"><?= $cat->title()->html() ?></option>
                    <?php endforeach ?>
                </select>

                <label for="color">Color</label>
                <select id="color" name="filterColor" onchange="this.form.submit()">
                    <?php $colors = ['red', 'blue', 'pink', 'purple', 'green', 'yellow', 'orange', 'black', 'grey', 'white'] ?>
                    <option value="" selected>All colors</option>
                    <?php foreach ( $colors as $color ): ?>
                        <option<?= e(get('filterColor') == $color, ' selected') ?> value="<?=
$color ?>"><?= ucfirst($color) ?></option>
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
