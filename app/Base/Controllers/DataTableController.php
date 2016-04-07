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
    protected $parameters = [
        'dom' => 'Bfrtip',
        'buttons' => ['csv', 'excel', 'pdf'],
        'columnDefs' => [['defaultContent' => '-', 'targets' => '_all']]
    ];

    /**
     * Model that is used to generate this DataTable
     *
     * @var string
     */
    protected $model = "";

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
     * Properties of the relationships that are loaded via eager loading
     * For instance let Article has a Category and we want to show the Category title within the Article Datatable
     * You can load the article that belongs to category within query function like:
     *
     * public function query()
     * {
     *      $articles = Article::with('category');
     *      return $this->applyScopes($articles);
     * }
     *
     * $eager_columns = ['category' => 'title'];
     *
     * Another example, if there are two relationships loaded via eager loading
     *
     * public function query()
     * {
     *      $comments = Comment::with('category', 'article');
     *      return $this->applyScopes($articles);
     * }
     *
     * $eager_columns = ['category' => 'title', 'article' => 'title'];
     *
     * @var array
     */
    protected $eager_columns =  [];

    /**
     * Boolean columns for translation, show meaningful text instead of 1/true or 0/false
     *
     * @var array
     */
    protected $boolean_columns =  [];

    /**
     * Relations count columns, show the number of related models
     *
     * @var array
     */
    protected $count_columns =  [];

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
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $model = $this->getModelName();
        $datatables = $this->datatables->eloquent($this->query());
        foreach ($this->image_columns as $image_column) {
            $datatables = $datatables->editColumn($image_column, function ($model) use ($image_column) {
                return "<a target='_blank' href='{$model->$image_column}'>
                            <img style='max-height:50px'
                                 class='img-responsive'
                                 src='". asset($model->$image_column) ."'
                             />
                        </a>";
            });
        }
        foreach ($this->boolean_columns as $boolean_column) {
            $datatables = $datatables->editColumn($boolean_column, function ($model) use ($boolean_column) {
                return $model->$boolean_column == true ? trans("admin.fields.yes") : trans("admin.fields.no");
            });
        }
        foreach ($this->count_columns as $count_column) {
            $datatables = $datatables->editColumn($count_column, function ($model) use ($count_column) {
                return count($model->$count_column) ? $model->$count_column->count() : 0;
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
     * Get the table name of the model
     *
     * @return string
     */
    protected function getTableName()
    {
        return ((new $this->model)->getTable());
    }

    /**
     * Get model name
     *
     * @return string
     */
    protected function getModelName()
    {
        return strtolower(substr(strrchr($this->model, '\\'), 1));
    }

    /**
     * Translate column names
     *
     * @return array
     */
    protected function getColumns()
    {
        $columns = [];
        $model = $this->getModelName();
        $table = $this->getTableName();
        $array = array_merge($this->image_columns, $this->columns, $this->boolean_columns, $this->count_columns);
        foreach ($array as $key => $column) {
            $string = join([$table, $column], ".");
            $title = trans('admin.fields.' . join([$model, $column], '.'));
            $orderAndSearch = $key < (count($array) - count($this->count_columns)) ? true : false;
            array_push($columns, [
                'data' => $column, 'name' => $string, 'title' => $title,
                'orderable' => $orderAndSearch, 'searchable' => $orderAndSearch
            ]);
        }
        foreach ($this->eager_columns as $key => $value) {
            $string = join([$key, $value], ".");
            $title = trans('admin.fields.' . $string);
            array_push($columns, ['data' => $string, 'name' => $string, 'title' => $title]);
        }
        foreach ($this->common_columns as $column) {
            $string = join([$table, $column], ".");
            $title = trans('admin.fields.' . $column);
            array_push($columns, ['data' => $column, 'name' => $string, 'title' => $title]);
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

