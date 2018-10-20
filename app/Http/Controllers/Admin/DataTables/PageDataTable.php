<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Base\Controllers\DataTableController;
use App\Models\Page;

class PageDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Page::class;

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
    protected $eager_columns = ['parent' => 'title'];

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
        return $this->applyScopes(Page::with('parent'));
    }
}
