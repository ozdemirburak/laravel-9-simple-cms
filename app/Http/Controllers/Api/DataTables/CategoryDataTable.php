<?php

namespace App\Http\Controllers\Api\DataTables;

use App\Base\Controllers\DataTableController;
use App\Category;

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
    protected $count_columns = ['articles'];

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $categories = Category::with('articles')->whereLanguageId(session('current_lang')->id);
        return $this->applyScopes($categories);
    }
}
