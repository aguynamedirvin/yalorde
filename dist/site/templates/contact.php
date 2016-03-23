<?php snippet('header') ?>

    <div class="location--map">
        <iframe width="100%" height="500" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=1830%20Joe%20Battle%20Boulevard%20%23105%2C%20El%20Paso%2C%20TX%2C%20United%20States&key=AIzaSyCBYY1loxW2aZb6HsZ-Hi6BtawaXNnOMU8" allowfullscreen></iframe>
    </div>

    <main class="wrap">

        <h1 class="page__title"><?php echo $page->title()->html() ?></h1>

        <div class="contact">

            <!-- Contact form -->
            <div class="contact__form">
                <form method="POST">
                    <input type="text" name="name" placeholder="<?= l::get('name') ?>" />
                    <input type="email" name="email" placeholder="<?= l::get('email') ?>" />

                    <textarea name="message" placeholder="<?= l::get('message') ?>"></textarea>

                    <button type="submit"><?= l::get('send') ?></button>
                </form>
            </div><!-- /.contact form -->


            <!-- Contact info -->
            <div class="contact__info">
                <div class="contact__method  contact__method--phone">
                    <h3><?= l::get('phone') ?></h3>
                    <div class="contact__detail">
                        <a href="tel:+1<?= formatNumber(page('contact')->phone()) ?>">
                            <?= $page->phone()->html() ?>
                        </a>
                    </div>
                </div>

                <div class="contact__method  contact__method--location">
                    <h3><?= l::get('location') ?></h3>
                    <div class="contact__detail">
                        <div class="contact__street">1830 Joe Battle Blvd. #105</div>
                        <div class="contact__region">El Paso, TX 79936</div>
                    </div>
                </div>

                <div class="contact__method  contact__method--operation">
                    <h3><?= l::get('hours') ?></h3>
                    <div class="contact__detail">
                        <?php foreach($page->work_hours()->toStructure() as $time): ?>
                            <div class="contact__hour-set">
                                <?php
                                    // Create times
                                    $opening_time = date_create($time->open_hours());
                                    $closing_time = date_create($time->closing_hours());

                                    // Format times
                                    $opening_time = date_format($opening_time, 'g:i A');
                                    $closing_time = date_format($closing_time, 'g:i A');
                                ?>
                                <span class="contact__days"><?= $time->day()->html() ?>:</span>
                                <span class="contact__hours"><?= $opening_time ?> &#8212; <?= $closing_time ?></span>
                            </div>
						<?php endforeach ?>
                    </div>
                </div>

            </div><!-- /.contact info -->


        </div><!-- /.contact container -->

    </main>

<?php snippet('footer') ?>
