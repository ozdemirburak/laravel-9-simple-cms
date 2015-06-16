<?php

namespace App\Listeners;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SetUserLoginCredentials
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
     * Update authenticated user's login timestamp and ip address
     *
     * @param User $user
     * @return void
     */
    public function handle(User $user)
    {
        $user->logged_in_at = Carbon::now();
        $user->ip_address = $this->request->getClientIp();
        $user->save();
    }

}
