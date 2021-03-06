<?php

$exclude = c::get('sitemap.exclude', array('error'));
$important = c::get('sitemap.important', array('home'));

kirby()->routes(array(
    array(
        'pattern' => 'sitemap.xml',
        'action'  => function() use ($exclude, $important) {

            $sitemap = '<?xml version="1.0" encoding="utf-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
            foreach(site()->languages() as $l) {
              foreach(site()->pages()->index() as $p){
                  if(!in_array($p->uri(), $exclude) and $p->isVisible()){
                      $sitemap .= '<url><loc>' . html($p->url($l->code()));
                      $sitemap .= '</loc><lastmod>' . $p->modified('c') . '</lastmod><priority>';
                      $sitemap .= ($p->isHomePage()||in_array($p->uri(), $important)) ? 1 : 0.6/$p->depth();
                      $sitemap .= '</priority></url>';
                  }
              }
            }
            $sitemap .= '</urlset>';

            return new Response($sitemap, 'xml');

        }
    )
));

?>
