<?php

namespace App\Http\Controllers\Api\DataTables;

use App\Base\Controllers\DataTableController;
use App\User;

class UserDataTable extends DataTableController
{
    /**
     * @var string
     */
    protected $model = User::class;

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['name', 'email', 'ip_address', 'logged_in_at', 'logged_out_at'];

    /**
     * Image columns to show
     *
     * @var array
     */
    protected $image_columns = ['picture'];

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $users = User::query();
        return $this->applyScopes($users);
    }
}
