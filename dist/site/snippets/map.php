<?php

$address = page('contact')->location()->yaml()['address'];

?>

<div class="location--map">
    <iframe width="100%" height="500" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=<?= rawurlencode($address) ?>&key=AIzaSyCBYY1loxW2aZb6HsZ-Hi6BtawaXNnOMU8" allowfullscreen></iframe>
</div>