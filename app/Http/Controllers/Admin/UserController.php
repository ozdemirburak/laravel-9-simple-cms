<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'email'     => 'required|email|max:255|unique:users,email',
        'password'  => 'required|min:6|confirmed'
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\UserDataTable $dataTable
     *
     * @return mixed
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.user.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.user', $this->formVariables('user', null));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(User::class, $request);
    }

    /**
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(User $user)
    {
        return view('admin.show', ['object' => $user]);
    }

    /**
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(User $user)
    {
        return view('admin.forms.user', $this->formVariables('user', $user));
    }

    /**
     * @param \App\Models\User $user
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(User $user, Request $request)
    {
        return $this->saveFlashRedirect($user, $request);
    }

    /**
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if ($user->id !== auth()->user()->id) {
            return $this->destroyFlashRedirect($user);
        }
        return $this->redirectRoutePath('index', 'admin.delete.self');
    }
}
