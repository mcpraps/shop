<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

/**
 * Class ResetPasswordController
 *
 * @package App\Http\Controllers\Auth
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class ResetPasswordController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;


	/**
	 * Display the password reset view for the given token.
	 *
	 * If no token is present, display the link request form.
	 *
	 * @param Request $request
	 * @return Factory|View
	 */
	public function showResetForm(Request $request)	{
		$token = $request->route()->parameter('token');

		return view('public.admin-reset-pw')->with(
			['token' => $token, 'email' => $request->email]
		);
	}


	/**
	 * Get the broker to be used during password reset.
	 *
	 * @return PasswordBroker
	 */
	public function broker(): PasswordBroker {
		return Password::broker('admin_users');
	}


	/**
	 * Get the guard to be used during password reset.
	 *
	 * @return StatefulGuard
	 */
	protected function guard(): StatefulGuard {
		return Auth::guard('admin_users');
	}


}
