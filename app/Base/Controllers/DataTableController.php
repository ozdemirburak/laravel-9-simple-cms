<?php

namespace App\Base\Controllers;

use Yajra\Datatables\Services\DataTable;

abstract class DataTableController extends DataTable
{
    /**
     * Default parameters
     *
     * @var array
     */
    protected $parameters = ['dom' => 'Bfrtip', 'buttons' => ['csv', 'excel', 'pdf']];

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns =  [];

    /**
     * Columns with pluck, relation key, desired relation property
     *
     * @var array
     */
    protected $pluck_columns =  [];

    /**
     * Show the action buttons, show, edit and delete
     *
     * @var array
     */
    protected $ops = true;

    /**
     * Common columns such that used by more than one class, so that translation belongs to root, not to any model
     * specially, for instance, every model has `created_at` and `updated_at` attribute, hence translation of those
     * properties are single, instead of defining for each model, like `admin.fields.published_at` and so on.
     *
     * @var array
     */
    protected $common_columns = ['created_at', 'updated_at'];

    /**
     * Model name
     *
     * @var string
     */
    protected $model = "";

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $model = $this->getModelName();
        $datatables = $this->datatables->eloquent($this->query());
        foreach ($this->pluck_columns as $key => $value) {
            $datatables = $datatables->editColumn($key, function ($relation) use ($value) {
                return $relation->$value;
            });
        }
        if ($this->ops === true) {
            $datatables = $datatables->addColumn('ops', function ($data) use ($model) {
                return get_ops($model, $data->id);
            });
        }
        return $datatables->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->parameters($this->getParameters());
    }

    /**
     * Get model name, if isset the model parameter, then get it, if not then get the class name, strip "DataTable" out
     *
     * @return string
     */
    private function getModelName()
    {
        return strtolower(
            empty($this->model) ?
            explode('DataTable', substr(strrchr(get_class($this), '\\'), 1))[0]  :
            $this->model
        );
    }

    /**
     * Translate column names
     *
     * @return array
     */
    protected function getColumns()
    {
        $model = $this->getModelName();
        $columns = [];
        foreach (array_merge($this->columns, array_keys($this->pluck_columns)) as $column) {
            $title = trans('admin.fields.' . $model . '.' . $column);
            array_push($columns, ['data' => $column, 'name' => $column, 'title' => $title]);
        }
        foreach ($this->common_columns as $column) {
            $title = trans('admin.fields.' . $column);
            array_push($columns, ['data' => $column, 'name' => $column, 'title' => $title]);
        }
        if ($this->ops === true) {
            $title = trans('admin.ops.name');
            array_push($columns, [
                'data' => 'ops', 'name' => 'ops', 'title' => $title,
                'orderable' => false, 'searchable' => false
            ]);
        }
        return $columns;
    }

    /**
     * Translate DataTable parameters, such as search, showing number to number out of number entries exc.
     *
     * @return array
     */
    protected function getParameters()
    {
        return array_merge($this->parameters, ['oLanguage' => trans('admin.datatables')]);
    }
}
