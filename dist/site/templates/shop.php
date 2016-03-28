<?= snippet('header') ?>

    <?php

    $category = $page;
    $products = $page->index()->visible()->filterBy('template', 'product')->paginate(16);

    $pagination = $products->pagination();

    ?>

    <div class="shop__header" style="background-image: url('assets/images/examples/dresses.jpg')">
        <h1 class="page__title"><?= $category->title()->html() ?></h1>
    </div>

    <main class="wrap  shop">

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
