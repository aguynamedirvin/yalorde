<?php

    $pages = $pages->visible();
    $categories = $site->children()->index()->filterBy('template', 'category');
    $pages = $pages->merge($categories);

?>


<!-- Desktop navigation -->
<nav class="site-nav  nav">
    <div class="wrap">
        <ul>
            <?php foreach ($pages as $page): ?>
                <li>
                    <a href="<?= $page->url() ?>"><?= $page->title()->html() ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</nav>



<!-- Mobile header/navigation -->
<header class="mobile-header">
    <div class="mobile-logo">
        <a href="<?= $site->url() ?>">
            <img src="<?= $site->url() ?>/assets/images/logo.svg" alt="<?= $site->title()->html() ?>">
        </a>
    </div>

    <a class="mobile-nav-trigger" href="#0">
        <span class="mobile-menu-text">Menu</span><span class="mobile-menu-icon"></span>
    </a> <!-- cd-primary-nav-trigger -->

    <nav>
        <ul class="mobile-nav">

            <?php foreach ($pages as $page): ?>
            <li><a href="<?= $page->url() ?>"><?= $page->title()->html() ?></a></li>
            <?php endforeach ?>


            <li class="mobile-label">Follow us</li>
            <?= snippet('socialicons') ?>

        </ul>
    </nav>

</header>
