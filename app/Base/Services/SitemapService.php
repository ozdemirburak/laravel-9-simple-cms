<?php

namespace App\Base\Services;

use App\Models\Category;
use App\Models\Page;

class SitemapService
{
    /**
     * @var int
     */
    private $cacheDuration = 86400;

    /**
     * @var string
     */
    private $xml;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function render()
    {
        return cache()->remember('sitemap', $this->cacheDuration, function () {
            $this->init();
            $this->addUrl(route('root'));
            Page::all()->each(function ($p) {
                $this->addUrl($p->link, $p->updated_at);
            });
            Category::with('articles')->get()->each(function ($c) {
                $this->addUrl($c->link);
                $c->articles->each(function ($a) {
                    $this->addUrl($a->link, $a->updated_at);
                });
            });
            return $this->end();
        });
    }

    /**
     * @param string $set
     *
     * @return string
     */
    private function init($set = 'urlset') : string
    {
        $this->xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $this->xml .= '<'. $set .' xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        return $this->xml;
    }

    /**
     * @param string $set
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    private function end($set = 'urlset')
    {
        $this->xml .= '</'. $set . '>';
        return response($this->xml)->header('Content-Type', 'application/xml');
    }

    /**
     * @param string $loc
     * @param string $lastmod
     *
     * @return string
     */
    private function addUrl($loc, $lastmod = null): string
    {
        $this->xml .= '<url>';
        $this->xml .= '<loc>' . $loc . '</loc>';
        if ($lastmod !== null) {
            $this->xml .= '<lastmod>' . $lastmod . '</lastmod>';
        }
        $this->xml .= '</url>';
        return $this->xml;
    }
}
