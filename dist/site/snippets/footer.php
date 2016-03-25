    <footer class="site-footer">
        <div class="wrap">
            <div class="footer__widget">
                <h3><?= l::get('contact') ?></h3>
                <ul>
                    <?php
                        $contact = page('contact');
                        $address = $contact->location()->yaml()['address'];
                    ?>
                    <li><a href="<?= $contact->url() ?>"><?= $address ?></a></li>
                    <li>Tel. <a href="tel: +19152316762"><?= $contact->phone()->html() ?></a></li>
                    <li>Email. <a href="mailto: <?= $contact->email()->html() ?>"><?= $contact->email()->html() ?></a></li>
                </ul>
            </div>
            <div class="footer__widget">
                <h3><?= l::get('follow-us') ?></h3>

                <ul class="social-icons">
                    <?php

                        $facebook   = $contact->facebook();
                        $twitter    = $contact->twitter();
                        $instagram  = $contact->instagram();
                        $pinterest  = $contact->pinterest();
                        $googleplus = $contact->google_plus();

                    ?>

                    <!-- Social Networks -->
                    <?php

                    // Facebook
                    ecco( $facebook->isNotEmpty(), '<li><a href="' . $facebook->toURL() . '"><i class="fa fa-facebook"></i></a></li>');

                    // Twitter
                    ecco( $twitter->isNotEmpty(), '<li><a href="' . $twitter->toURL() . '"><i class="fa fa-twitter"></i></a></li>');

                    // Pinterest
                    ecco( $pinterest->isNotEmpty(), '<li><a href="' . $pinterest->toURL() . '"><i class="fa fa-pinterest"></i></a></li>');

                    // Instagram
                    ecco( $instagram->isNotEmpty(), '<li><a href="' . $instagram->toURL() . '"><i class="fa fa-instagram"></i></a></li>');

                    // Google Plus
                    ecco( $googleplus->isNotEmpty(), '<li><a href="' . $googleplus->toURL() . '"><i class="fa fa-google-plus"></i></a></li>');

                    ?>
                </ul>
            </div>

            <div class="footer__widget">
                <h3><?= l::get('quick-links') ?></h3>
                <ul>
                    <?php

                        $links = $site->footer_links()->split();
                        $index = $site->index();

                        foreach ($links as $link) {
                            $link = $index->findByURI($link);

                            echo '<li><a href="' . $link->url() . '">' . $link->title() . '</a></li>';
                        }

                    ?>
                </ul>
            </div>
        </div>
    </footer>

    <div class="site-info">
        <div class="wrap">
            <div class="pull--left">
                <?= l::get('squarepixl') ?>
            </div>
            <div class="pull--left@md  pull--right">
                &copy; <?= date('Y') . ' ' . $site->title()->html() . '. ' . l::get('copyright') ?>.
            </div>
        </div>
    </div>



    <!-- JavaScript -->
    <?= js('assets/js/vendor/jquery-2.2.0.min.js') ?>

    <?= js('assets/js/main.min.js') ?>



    </body>
</html>
