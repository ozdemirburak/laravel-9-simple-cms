<?php

namespace App\Http\Controllers\Api\DataTables;

use App\Base\Controllers\DataTableController;
use App\Article;

class ArticleDataTable extends DataTableController
{
    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['title'];

    /**
     * Columns with pluck, relation key, relation, expected relation property
     *
     * @var array
     */
    protected $pluck_columns = ['category_id' => ['category', 'title']];

    /**
     * Common columns for translation
     *
     * @var array
     */
    protected $common_columns = ['read_count', 'published_at', 'created_at', 'updated_at'];

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $articles = Article::with('category')->whereHas('category', function ($q) {
            $q->where('language_id', session('current_lang')->id);
        });
        return $this->applyScopes($articles);
    }
}
