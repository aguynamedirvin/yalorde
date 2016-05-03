<?php

    $pages = $pages->visible();
    $categories = $site->children()->index()->filterBy('template', 'category');
    $pages = $pages->merge($categories);

?>

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
