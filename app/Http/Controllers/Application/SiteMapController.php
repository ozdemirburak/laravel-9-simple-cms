<?php

namespace App\Http\Controllers\Application;

use App\Article;
use App\Base\Controllers\ApplicationController;
use App\Category;
use App\Language;
use App\Page;
use Carbon\Carbon;
use Sitemap;

class SiteMapController extends ApplicationController
{
    /**
     * Set sitemap
     *
     * @return Response
     */
    public function index()
    {
        Sitemap::addTag(route('root'), Carbon::now()->toDateTimeString(), 'daily', '1.0');
        Language::with('articles', 'categories', 'pages')->get()->each(function ($language) {
            $language->pages->each(function (Page $page) {
                Sitemap::addTag($page->link, $page->updated_at, 'daily', '0.95');
            });
            $language->categories->each(function (Category $category) {
                Sitemap::addTag($category->link, $category->updated_at, 'daily', '0.95');
            });
            $language->articles->each(function (Article $article) {
                Sitemap::addTag($article->link, $article->published_at, 'daily', '0.95');
            });
        });
        return Sitemap::render();
    }
}
