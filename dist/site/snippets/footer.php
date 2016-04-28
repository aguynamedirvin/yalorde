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

                <?= snippet('socialicons') ?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        // jQuery fallback
        if ( !window.jQuery ) {
            document.write('<script src="assets/js/vendor/jquery-2.2.0.min.js"><\/script>');
        }
        // Download fonts
        WebFontConfig = {
            google: {
                families: ['Montserrat']
            },
            custom: {
                families: ['FontAwesome'],
                urls: ['https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css']
            }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    <?= js('assets/js/main.min.js') ?>



    </body>
</html>
