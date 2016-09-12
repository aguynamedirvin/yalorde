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
                        <?php $cat = $cat->title()->html() ?>
                        <option <?= e(get('filterCategory') == $cat, 'selected') ?> value="<?= $cat ?>"><?= $cat ?></option>
                    <?php endforeach ?>
                </select>

                <label for="color">Color</label>
                <select id="color" name="filterColor" onchange="this.form.submit()">
                    <option value="" selected>All colors</option>
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="pink">Pink</option>
                    <option value="purple">Purple</option>
                    <option value="green">Green</option>
                    <option value="yellow">Yellow</option>
                    <option value="orange">Orange</option>
                    <option value="black">Black</option>
                    <option value="white">White</option>
                    <option value="grey">Grey</option>
                </select>
            </form>
        </div><!-- /. filter products -->


        <div class="product__list">
            <?= snippet('product.list', ['products' => $products]) ?>
        </div>


        <?= snippet('pagination', ['pagination' => $pagination]) ?>


    </main>


<?= snippet('footer') ?>
