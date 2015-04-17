<?php namespace App\Handlers\Events;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;

class LoginEventHandler {

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
