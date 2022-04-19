<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Request;

/**
 * Class SuccessfulLogin
 *
 * @package App\Listeners
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class SuccessfulLogin {


	/**
	 * Handle the event.
	 *
	 * @param Login $event
	 *
	 * @return void
	 */
	public function handle(Login $event) {
		$event->user->last_login_at = Carbon::now();
		$event->user->last_login_ip = Request::getClientIp();;
		$event->user->save();
	}


}
