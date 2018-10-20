<?php

namespace App\Base\Services;

use App\Models\Category;
use App\Models\Page;

class SitemapService
{
    /**
     * @var int
     */
    protected static $cacheDuration = 1440;

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function render()
    {
        return cache()->remember('sitemap_events', static::$cacheDuration, function () {
            $xml = static::init();
            static::addUrl($xml, route('root'), static::getToday(), 'daily', '1.0');
            Page::all()->each(function ($p) use (&$xml) {
                static::addUrl($xml, $p->link, static::getToday(), 'daily', '1.0');
            });
            Category::with('articles')->get()->each(function ($c) use (&$xml) {
                static::addUrl($xml, $c->link, static::getToday(), 'daily', '1.0');
                $c->articles->each(function ($a) use (&$xml) {
                    static::addUrl($xml, $a->link, static::getToday(), 'daily', '1.0');
                });
            });
            return static::end($xml);
        });
    }

    /**
     * @param string $set
     *
     * @return string
     */
    private static function init($set = 'urlset') : string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<'. $set .' xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        return $xml;
    }

    /**
     * @param        $xml
     * @param string $set
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    private static function end($xml, $set = 'urlset')
    {
        $xml .= '</'. $set . '>';
        return response($xml)->header('Content-Type', 'application/xml');
    }

    /**
     * @param        $xml
     * @param        $loc
     * @param        $lastmod
     * @param string $changefreq
     * @param float  $priority
     */
    private static function addUrl(&$xml, $loc, $lastmod, $changefreq = 'monthly', $priority = 0.9): void
    {
        $xml .= '<url>';
        $xml .= '<loc>' . $loc . '</loc>';
        $xml .= '<lastmod>' . $lastmod . '</lastmod>';
        $xml .= '<changefreq>' . $changefreq .'</changefreq>';
        $xml .= '<priority>' . $priority . '</priority>';
        $xml .= '</url>';
    }


    /**
     * @param $xml
     * @param $loc
     * @param $lastmod
     */
    private static function addSitemap(&$xml, $loc, $lastmod): void
    {
        $xml .= '<sitemap>';
        $xml .= '<loc>' . $loc . '</loc>';
        $xml .= '<lastmod>' . $lastmod . '</lastmod>';
        $xml .= '</sitemap>';
    }

    /**
     * @return string
     */
    private static function getToday() : string
    {
        return now()->startOfDay()->hour(7)->toAtomString();
    }
}
