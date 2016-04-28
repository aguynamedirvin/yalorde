<ul class="social-icons">
    <?php

        $contact = page('contact');

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
