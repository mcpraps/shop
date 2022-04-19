<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\View\View;

/**
 * Class ForgotPasswordController
 *
 * @package App\Http\Controllers\Auth
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class ForgotPasswordController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


	/**
	 * Display the form to request a password reset link.
	 *
	 * @return View
	 */
	public function showLinkRequestForm(): View {
		return view('public.admin-forgot-pw');
	}


}
