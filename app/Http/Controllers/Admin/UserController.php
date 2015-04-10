<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Datatable;
use Laracasts\Flash\Flash;
use Auth;

class UserController extends Controller {

	/**
	 * Display a listing of the users.
	 *
	 * @return Response
	 */
	public function index()
	{
        $table = $this->setDatatable();
        return view('admin.users.index', compact('table'));
	}

	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('admin.users.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if($id != Auth::user()->id)
        {
            User::destroy($id) == true ? Flash::success(trans('admin.delete.success')) :
                Flash::error(trans('admin.delete.fail'));
        }
        else
        {
            Flash::error(trans('admin.delete.self'));
        }
        return redirect(route('admin.user.index'));
	}

    private function setDatatable()
    {
        return Datatable::table()
            ->addColumn(trans('admin.fields.user.name'), trans('admin.fields.updated_at'))
            ->addColumn(trans('admin.ops.name'))
            ->setUrl(route('admin.user.table'))
            ->setOptions(array('sPaginationType' => 'bs_normal', 'oLanguage' => trans('admin.datatables')))
            ->render();
    }

    public function getDatatable()
    {
        return Datatable::collection(User::all())
            ->showColumns('name')
            ->addColumn('updated_at',function($model)
            {
                return $model->updated_at->toDateTimeString();
            })
            ->addColumn('',function($model)
            {
                return get_ops('user', $model->id);
            })
            ->searchColumns('name')
            ->orderColumns('name','updated_at')
            ->make();
    }

}
