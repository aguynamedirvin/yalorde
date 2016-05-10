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
            <?= snippet('list.product', ['products' => $products]) ?>
        </div>


        <?php if( $pagination->hasPages() && $pagination->pages() > 1 ): ?>
        <!-- Page navigation -->
        <div class="page-nav">
            <ul>
                <?php if( $pagination->hasPrevPage() ): ?>
                <li><a class="prev" href="<?= $pagination->prevPageUrl() ?>">&larr;</a></li>
                <?php endif ?>

                <?php foreach( $pagination->range(10) as $page ): ?>
                <li><a <?= e( $pagination->page() == $page, ' class="current"') ?> href="<?= $pagination->pageURL($page) ?>"><?= $page ?></a></li>
                <?php endforeach ?>

                <?php if( $pagination->hasNextPage() ): ?>
                <li><a class="next" href="<?= $pagination->nextPageURL() ?>">&rarr;</a></li>
                <?php endif ?>
            </ul>
        </div><!-- /. page navigation -->
        <?php endif ?>


    </main>


<?= snippet('footer') ?>
