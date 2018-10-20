<?php

namespace App\Http\Controllers\Admin\DataTables;

use App\Base\Controllers\DataTableController;
use App\Models\User;

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
    protected $columns = ['email', 'ip_address', 'logged_in_at', 'logged_out_at'];

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
        $users = User::query();
        return $this->applyScopes($users);
    }
}
