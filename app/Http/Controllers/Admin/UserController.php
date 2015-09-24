<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Services\ImageService;
use App\User;
use Auth;
use Datatable;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
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
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\UsersForm', [
            'method' => 'POST',
            'url' => route('admin.user.store')
        ]);
        return view('admin.users.create', compact('form'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param UserRequest $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create(ImageService::uploadImage($request, 'picture'));
        $user->id ? Flash::success(trans('admin.create.success')) : Flash::error(trans('admin.create.fail'));
        return redirect(route('admin.user.index'));
    }

    /**
     * Display the specified user.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param User $user
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function edit(User $user, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\UsersForm', [
            'method' => 'PATCH',
            'url' => route('admin.user.update', ['id' => $user->id]),
            'model' => $user
        ]);
        return view('admin.users.edit', compact('form', 'user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param User $user
     * @param UserRequest $request
     * @return Response
     */
    public function update(User $user, UserRequest $request)
    {
        $user->fill(ImageService::uploadImage($request, 'picture'));
        $user->save() ? Flash::success(trans('admin.update.success')) : Flash::error(trans('admin.update.fail'));
        return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        if($user->id != Auth::user()->id)
        {
            $user->delete() ? Flash::success(trans('admin.delete.success')) : Flash::error(trans('admin.delete.fail'));
        }
        else
        {
            Flash::error(trans('admin.delete.self'));
        }
        return redirect(route('admin.user.index'));
    }

    /**
     * Create DataTable HTML
     *
     * @return mixed
     * @throws \Exception
     */
    private function setDatatable()
    {
        return Datatable::table()
            ->addColumn(trans('admin.fields.user.name'), trans('admin.fields.user.ip_address'), trans('admin.fields.user.logged_in_at'), trans('admin.fields.user.logged_out_at'))
            ->addColumn(trans('admin.ops.name'))
            ->setUrl(route('api.table.user'))
            ->setOptions(['sPaginationType' => 'bs_normal', 'oLanguage' => trans('admin.datatables')])
            ->render();
    }

}
