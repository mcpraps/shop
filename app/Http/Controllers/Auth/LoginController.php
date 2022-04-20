<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers\Auth
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class LoginController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }


	/**
	 * Show the application's login form.
	 *
	 * @return View
	 */
	public function showLoginForm(): View {
		return view('public.admin-login');
	}


	/**
	 * Get the needed authorization credentials from the request.
	 *
	 * @param Request $request
	 * @return array
	 */
	protected function credentials(Request $request): array {
		return [$this->username() => $request->{$this->username()}, 'password' => $request->password, 'is_active' => 1];
	}


	/**
	 * Get the guard to be used during authentication.
	 *
	 * @return StatefulGuard
	 */
	protected function guard(): StatefulGuard {
		return Auth::guard('admin_users');
	}


}
