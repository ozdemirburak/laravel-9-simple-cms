<?php

namespace App\Http\Controllers\Api\DataTables;

use App\Base\Controllers\DataTableController;
use App\Language;

class LanguageDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = Language::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['title', 'code'];

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $languages = Language::query();
        return $this->applyScopes($languages);
    }
}
