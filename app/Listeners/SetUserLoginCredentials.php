<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
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
     * @param Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->logged_in_at = Carbon::now();
        $event->user->ip_address = $this->request->getClientIp();
        $event->user->save();
    }
}
