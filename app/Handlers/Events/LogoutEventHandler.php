<?php namespace App\Handlers\Events;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;

class LogoutEventHandler {

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
