<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);
Route::group([
	'prefix'        => 'admin',
	'middleware'    => 'auth:admin_users',
	'as'            => 'admin.',
	'namespace'     => 'Admin'
], function () {
	Route::get('/dashboard', function (Request $request) {
		return 'test';
	});
});