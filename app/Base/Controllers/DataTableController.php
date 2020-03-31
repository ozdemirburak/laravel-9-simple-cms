<?php

namespace App\Base\Controllers;

use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

abstract class DataTableController extends DataTable
{
    /**
     * Default parameters
     *
     * @var array
     */
    protected $parameters = [
        'dom' => 'Bfrtip',
        'buttons' => ['excel', 'csv', 'reload'],
        'columnDefs' => [['defaultContent' => '-', 'targets' => '_all']],
        'scrollX' => true
    ];

    /**
     * Datatables order for parameters, 0 is the first column
     *
     * @var array
     */
    protected $order = [0, 'asc'];

    /**
     * Model that is used to generate this DataTable
     *
     * @var string
     */
    protected $model = '';

    /**
     * Columns to show
     *
     * @var array
     */
    protected $columns =  [];

    /**
     * Image columns to show the value wrapped in img tag, in other words, show image instead of a column value
     *
     * @var array
     */
    protected $image_columns =  [];

    /**
     * Boolean columns for translation, show meaningful text instead of 1/true or 0/false
     *
     * @var array
     */
    protected $boolean_columns =  [];

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
     * Relations count columns, show the number of related models. Ordering is not allowed.
     *
     * Example:
     *
     * protected $count_columns = ['books'];
     *
     * $languages = Language::with('books');
     * return $this->applyScopes($languages);
     *
     * @var array
     */
    protected $count_columns =  [];

    /**
     * Relations count columns, show the number of related models. Ordering is allowed.
     *
     * Example:
     *
     * protected $count_join_columns = ['book_count'];
     *
     * $languages = Language::leftJoin('books', 'languages.id', '=', 'books.language_id')
     *    ->select(\DB::raw('languages.*, count(books.id) as book_count'))
     *    ->groupBy('languages.id');
     * return $this->applyScopes($languages);
     *
     * @var array
     */
    protected $count_join_columns = [];

    /**
     * Show the action buttons, show, edit and delete.
     *
     * Of course, you need to set this to false, if there exists a model with datatable but is not a resource.
     * In other words, set this to false, if the model does not have show/delete/edit routes.
     *
     * @var bool
     */
    protected $ops = false;

    /**
     * Common columns such that used by more than one class, so that translation belongs to root, not to any model
     * specially, for instance, every model has `created_at` and `updated_at` attribute, hence translation of those
     * properties are single, instead of defining for each model, like `admin.fields.published_at` and so on.
     *
     * @var array
     */
    protected $common_columns = ['created_at', 'updated_at'];

    /**
     * Laravel DataTables escapes all output by default.
     *
     * Define all the fields that should not be escaped but ops as ops is already included if set true like above
     *
     * @var array
     */
    protected $raw_columns = [];

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax(): \Illuminate\Http\JsonResponse
    {
        [$model, $datatables] = $this->getAjaxParameters();
        collect($this->image_columns)->each(function ($image_column) use (&$datatables) {
            return $datatables->editColumn($image_column, function ($model) use ($image_column) {
                return $this->wrapImage($model, $image_column);
            });
        })->recollect($this->boolean_columns)->each(function ($boolean_column) use (&$datatables) {
            return $datatables->editColumn($boolean_column, function ($model) use ($boolean_column) {
                return $model->$boolean_column ? __('admin.fields.yes') : __('admin.fields.no');
            });
        })->recollect($this->eager_columns)->each(function ($eager_column, $relation) use (&$datatables) {
            $c = implode('.', [$relation, $eager_column]);
            return $datatables->editColumn($c, function ($model) use ($relation, $eager_column) {
                return !empty($model->$relation->$eager_column) ? $model->$relation->$eager_column : '';
            });
        })->recollect($this->count_columns)->each(function ($count_column) use (&$datatables) {
            return $datatables->editColumn($count_column, function ($model) use ($count_column) {
                return \count($model->$count_column);
            });
        });
        $datatables = $this->setRawColumns($this->pushOps($datatables, $model));
        return $datatables->make(true);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html(): \Yajra\Datatables\Html\Builder
    {
        return $this->builder()->columns($this->getColumns())->parameters($this->getParameters());
    }

    /**
     * @return array
     */
    protected function getAjaxParameters(): array
    {
        return [$this->getModelName(), new EloquentDataTable($this->query())];
    }

    /**
     * Translate and edit column names
     *
     * Countable columns which are the count of a relation should not have order and search options thus they
     * should get merged lastly, to make them searchable and orderable, you need to join through their table.
     *
     * @param array $result
     *
     * @return array
     */
    protected function getColumns(array $result = []): array
    {
        [$columns, $countColumnsPosition, $model, $table] = $this->getColumnParameters();
        collect($columns)->each(function ($column, $key) use ($model, $table, $countColumnsPosition, &$result) {
            $orderAndSearch = $key < $countColumnsPosition;
            $this->pushColumns($result, [
                'data' => $column,
                'name' => implode('.', [$table, $column]),
                'title' => __('admin.fields.' . implode('.', [$model, $column]))
            ], $orderAndSearch, $orderAndSearch);
        })->recollect($this->eager_columns)->each(function ($column, $key) use (&$result) {
            $string = implode('.', [$key, $column]);
            $this->pushColumns($result, [
                'data'  => $string,
                'name'  => $string,
                'title' => __('admin.fields.' . $string),
            ]);
        })->recollect($this->count_join_columns)->each(function ($column) use (&$result, $model) {
            $this->pushColumns($result, [
                'data'  => $column,
                'name'  => $column,
                'title' => __('admin.fields.' . implode('.', [$model, $column])),
            ], true, false);
        })->recollect($this->common_columns)->each(function ($column) use ($table, &$result) {
            $string = implode('.', [$table, $column]);
            $this->pushColumns($result, [
                'data'  => $column,
                'name'  => $string,
                'title' => __('admin.fields.' . $column),
            ]);
        });
        return $this->pushOps($result);
    }

    /**
     * @param array $result
     * @param mixed $data
     * @param bool  $order
     * @param bool  $search
     *
     * @return array
     */
    protected function pushColumns(&$result, $data, $order = true, $search = true): array
    {
        $result[] = array_merge($data, ['orderable' => $order, 'searchable' => $search]);
        return $result;
    }

    /**
     * @param        $datatables
     * @param string $model
     *
     * @return mixed
     */
    protected function pushOps($datatables, $model = '')
    {
        if ($this->ops === true) {
            if (empty($model)) {
                $this->pushColumns($datatables, [
                    'data'       => 'ops',
                    'name'       => 'ops',
                    'title'      => __('admin.ops.name'),
                    'exportable' => false
                ], false, false);
            } else {
                $datatables = $datatables->addColumn('ops', function ($data) use ($model) {
                    return view('partials.admin.ops', ['resource' => $model, 'id' => $data->id]);
                });
            }
            $this->raw_columns[] = 'ops';
        }
        return $datatables;
    }

    /**
     * Get the columns that are being translated, model and table
     *
     * @return array
     */
    protected function getColumnParameters(): array
    {
        return [
            $columns = array_merge($this->image_columns, $this->columns, $this->boolean_columns, $this->count_columns),
            \count($columns) - \count($this->count_columns),
            $this->getModelName(),
            $this->getTableName()
        ];
    }

    /**
     * Get the table name of the model
     *
     * @return string
     */
    protected function getTableName(): string
    {
        return (new $this->model)->getTable();
    }

    /**
     * Get model name
     *
     * @return string
     */
    protected function getModelName(): string
    {
        return Str::snake(class_basename($this->model));
    }

    /**
     * Show image instead of url for the image columns
     *
     * @param $model
     * @param $image_column
     *
     * @return string
     */
    protected function wrapImage($model, $image_column): string
    {
        $url = asset($model->$image_column);
        return "<a target='_blank' href='{$url}'><img alt='Image' style='max-height:50px' src='{$url}'/></a>";
    }

    /**
     * Translate DataTable parameters, such as search, showing number to number out of number entries exc.
     * Also add the order parameter
     *
     * @return array
     */
    protected function getParameters(): array
    {
        return array_merge(
            $this->parameters,
            ['order' => [$this->order]],
            ['oLanguage' => __('admin.datatables')]
        );
    }

    /**
     * @param $datatables
     *
     * @return mixed
     */
    protected function setRawColumns($datatables)
    {
        return $datatables->rawColumns(array_merge($this->raw_columns, $this->image_columns));
    }
}
