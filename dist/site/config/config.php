<?php

c::set('debug', true);
c::set('cache', false);

thumb::$defaults['quality'] = 85;
thumb::$defaults['upscale'] = true;
thumb::$defaults['crop']    = true;

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/



/*

---------------------------------------
Homepage Setup
---------------------------------------

*/

c::set('home', 'homepage');



/*

---------------------------------------
Languages
--------------------------------------

*/

c::set('language.detect', true);
c::set('languages', array(
    array(
        'code'    => 'en',
        'name'    => 'English',
        'default' => true,
        'locale'  => 'en_US',
        'url'     => '/',
    ),
    array(
        'code'    => 'es',
        'name'    => 'Español',
        'locale'  => 'es_US',
        'url'     => '/es',
    )
));



/*

---------------------------------------
Custom Panel stylesheet
---------------------------------------

*/

c::set('panel.stylesheet', '/assets/css/panel.css');



/*

---------------------------------------
Hooks
--------------------------------------

*/

// All new pages visible by default
kirby()->hook('panel.page.create', 'makeVisible');
function makeVisible($page) {
    try {
        $page->toggle('last');
    } catch(Exception $e) {
        return response::error($e->getMessage());
    }
}

// Shrink large images on upload
/*kirby()->hook('panel.file.upload', 'shrinkImage');
kirby()->hook('panel.file.replace', 'shrinkImage');
function shrinkImage($file, $maxDimension = 1000) {
    try {
        if ( $file->type() == 'image' and ($file->width() > $maxDimension or $file->height() > $maxDimension) ) {

            // Get original file path
            $originalPath = $file->dir() . '/' . $file->filename();

            // Create a thumb and get its path
            $resized = $file->resize($maxDimension);
            $resizedPath = $resized->dir() . '/' . $resized->filename();

            // Replace the original file with the resized one
            copy( $resizedPath, $originalPath );
            unlink( $resizedPath );

        }
    } catch(Exception $e) {
        return response::error($e->getMessage());
    }
}*/


/*

---------------------------------------
Routes
--------------------------------------

*/
c::set('routes', array(
    /**
     * Return search results
     */
    array(
        'pattern'   => 'search/(:any)',
        'action'    => function ($uri) {

            $query   = urldecode($uri);
            $results = page('shop')->index()->visible()->filterBy('template', 'product')->search($query, 'title|sku|tags|color|category')->limit(5)->toJson();

            return response::json(array(
                $results
            ));
        }
    ),
    /**
     * Use the same template ('category') for subcategories
     */
    /*array(
        'pattern'   => 'shop/(:any)/(:any)',
        'action'    => function($cat, $subcat) {

            $page = 'shop/' . $cat;

            $data = array(
                'subcategory' => $subcat
            );

            return array($page, $data);
        }
    ),*/
));
