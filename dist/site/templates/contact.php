<?php snippet('header') ?>

    <?= snippet('map') ?>

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
                        <a href="tel:+1<?= formatPhone(page('contact')->phone()) ?>">
                            <?= $page->phone()->html() ?>
                        </a>
                    </div>
                </div>

                <div class="contact__method  contact__method--location">
                    <h3><?= l::get('location') ?></h3>
                    <div class="contact__detail">
                        <div class="contact__street">103 Joe Battle Blvd. Suite #105</div>
                        <div class="contact__region">El Paso, TX 79938</div>
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
