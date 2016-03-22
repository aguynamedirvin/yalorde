<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

        <!-- Stylesheets -->
        <?= css('assets/css/main.css') ?>


        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    </head>

    <body>

        <div class="topbar  hide@md">
            <div class="wrap">
                <?php if ( $site->display_message()->isTrue() ): ?>
                <span class="pull--left"><?= $site->message()->html() ?></span>
                <?php endif ?>

                <span class="pull--right">
                    <span class="block"><?= l::get('call-us') ?>: <a href="tel: +19151234567"><?= page('contact')->phone()->html() ?></a></span>
                    <span class="block">
                        <?= l::get('language') ?>:
                        <?php foreach($site->languages() as $language): ?>
							<a href="<?= $page->url($language->code()) ?>"><?= $language->name() ?></a>
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
