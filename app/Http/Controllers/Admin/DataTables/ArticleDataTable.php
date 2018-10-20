<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Base\Controllers\DataTableController;
use App\Models\Article;

class ArticleDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Article::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['title'];

    /**
     * Columns of relations, relation name as key, relation property as value
     *
     * @var array
     */
    protected $eager_columns = ['category' => 'title'];

    /**
     * Common columns for translation
     *
     * @var array
     */
    protected $common_columns = ['published_at', 'created_at', 'updated_at'];

    /**
     * @var bool
     */
    protected $ops = true;

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->applyScopes(Article::with('category'));
    }
}
