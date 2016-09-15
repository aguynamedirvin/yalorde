<?php if( $pagination->hasPages() && $pagination->pages() > 1 ): ?>
    <!-- Page navigation -->
    <div class="page-nav">
        <ul>
            <?php if( $pagination->hasPrevPage() ): ?>
                <li><a class="prev" href="<?= $pagination->prevPageUrl() ?>">&larr;</a></li>
            <?php endif ?>

            <?php foreach( $pagination->range(6) as $page ): ?>
                <li <?= e( $pagination->page() == $page, ' class="current"') ?>><a href="<?= $pagination->pageURL($page) ?>"><?= $page ?></a></li>
            <?php endforeach ?>

            <?php if( $pagination->hasNextPage() ): ?>
                <li><a class="next" href="<?= $pagination->nextPageURL() ?>">&rarr;</a></li>
            <?php endif ?>
        </ul>
    </div><!-- /. page navigation -->
<?php endif ?>
