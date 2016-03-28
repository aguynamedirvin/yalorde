<!DOCTYPE html>
<html class="no-js" lang="<?= $site->language()->code() ?>">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title><?= e( $page->isHomePage(), $site->title()->html(), $page->title()->html() . ' – ' . $site->title()->html() ); ?></title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="<?= $site->url() ?>/apple-touch-icon.png">
        <link rel="shortcut icon" href="<?= $site->url() ?>/favicon.ico" type="image/x-icon" />

        <!-- Stylesheets -->
        <?= css('assets/css/main.css') ?>


    </head>

    <body>

        <div class="topbar  hide@md">
            <div class="wrap">
                <?php if ( $site->display_message()->isTrue() ): ?>
                <span class="pull--left"><?= $site->message()->html() ?></span>
                <?php endif ?>

                <span class="pull--right">
                    <span class="block"><?= l::get('call-us') ?>: <a href="tel:+1<?= formatNumber(page('contact')->phone()) ?>"><?= page('contact')->phone()->html() ?></a></span>
                    <span class="block">
                        <?= l::get('language') ?>:
                        <?php foreach($site->languages() as $language): ?>
							<a href="<?= $page->url($language->code()) ?>"><?= $language->name() ?></a>
                            <?= e($language != $site->languages()->last(), ' / ') ?>
						<?php endforeach ?>
                    </span>
                </span>
            </div>
        </div>

        <div class="site-header">
            <a href="<?= $site->url() ?>">
                <div id="logo"></div>
            </a>
        </div>

        <?php snippet('nav') ?>
