<?= snippet('header') ?>

    <main class="wrap">

        <div class="error404">
            <h1 class="error404__404">404</h1>
            <p class="error404__message"><?= l::get('error-messge') ?></p>
            <a class="btn  center" href="<?= $site->url() ?>"><?= l::get('return-home') ?></a>
        </div>

    </main>

<?= snippet('footer') ?>
