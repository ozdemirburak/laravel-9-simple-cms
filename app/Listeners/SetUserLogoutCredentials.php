<?php

namespace App\Listeners;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SetUserLogoutCredentials
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Create the event handler.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Update authenticated user's logout timestamp
     *
     * @param User $user
     * @return void
     */
    public function handle(User $user)
    {
        $user->logged_out_at = Carbon::now();
        $user->save();
    }

}
