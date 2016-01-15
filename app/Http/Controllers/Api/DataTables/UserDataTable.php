<?php

namespace App\Http\Controllers\Api\DataTables;

use App\Http\Controllers\Api\DataTableController;
use App\User;

class UserDataTable extends DataTableController
{
    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns = ['name', 'email', 'ip_address', 'logged_in_at', 'logged_out_at'];

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
