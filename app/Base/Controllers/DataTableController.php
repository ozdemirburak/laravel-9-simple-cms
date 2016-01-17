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
     * Image columns to show within image tag
     *
     * @var array
     */
    protected $image_columns =  [];

    /**
     * Columns with pluck, relation key, desired relation property
     *
     * @var array
     */
    protected $pluck_columns =  [];

    /**
     * Show the action buttons, show, edit and delete
     *
     * @var bool
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
            $datatables = $datatables->editColumn($key, function ($model) use ($value) {
                return $model->$value[0]->$value[1];
            });
        }
        foreach ($this->image_columns as $image_column) {
            $datatables = $datatables->editColumn($image_column, function ($model) use ($image_column) {
                return "<a target='_blank' href='{$model->$image_column}'>
                            <img style='max-height:50px' class='img-responsive' src='{$model->$image_column}'/>
                        </a>";
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
        $base_columns = array_merge($this->image_columns, $this->columns);
        foreach (array_merge($base_columns, array_keys($this->pluck_columns)) as $column) {
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
