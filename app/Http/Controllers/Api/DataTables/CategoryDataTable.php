<?php

namespace App\Http\Controllers\Api\DataTables;

use App\Base\Controllers\DataTableController;
use App\Category;
use DB;

class CategoryDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Category::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['title', 'color'];

    /**
     * Columns to show relations count
     *
     * @var array
     */
    protected $count_join_columns = ['article_count'];

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $categories = Category::leftJoin('articles', 'categories.id', '=', 'articles.id')
            ->select(DB::raw('categories.*, count(articles.id) as article_count'))
            ->groupBy('categories.id')->whereLanguageId(session('current_lang')->id);
        return $this->applyScopes($categories);
    }
}
