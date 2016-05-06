<?php


/**
 * Format price
 *
 * @var int, float
 * @var int, float
 */

function formatPrice( $price, $priceSale ) {

    if ( $priceSale != '' ) {
        echo '<ins class="price  price--sale" property="price" itemprop="price">$' . $priceSale . '</ins>';
        echo '<del class="price  price--crossed" property="price">$' . $price . '</del>';
    } else  {
        echo '<span class="price" property="price" itemprop="price">$' . $price . '</span>';
    }

}

/**
 * Format phone number
 *
 * @var int, float
 */

function formatPhone( $number ) {
    echo preg_replace("/[^0-9]/", "", $number);
}


?>
