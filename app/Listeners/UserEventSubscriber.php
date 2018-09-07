<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;

class UserEventSubscriber
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
     * @param \Illuminate\Auth\Events\Login $event
     */
    public function onUserLogin(Login $event)
    {
        $event->user->logged_in_at = Carbon::now();
        $event->user->ip_address = $this->request->getClientIp();
        $event->user->save();
    }

    /**
     * @param \Illuminate\Auth\Events\Logout $event
     */
    public function onUserLogout(Logout $event)
    {
        $event->user->logged_out_at = Carbon::now();
        $event->user->save();
    }

    /**
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(Login::class, static::class . '@onUserLogin');
        $events->listen(Logout::class, static::class . '@onUserLogout');
    }
}
