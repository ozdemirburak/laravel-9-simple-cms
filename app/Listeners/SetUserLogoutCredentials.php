<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Logout;
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
     * @param Logout $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $event->user->logged_out_at = Carbon::now();
        $event->user->save();
    }
}
