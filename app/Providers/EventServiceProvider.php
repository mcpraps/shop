<?php

namespace App\Providers;

use App\Listeners\SuccessfulLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 *
 * @package App\Providers
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class EventServiceProvider extends ServiceProvider {

    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
		/*Registered::class => [
            SendEmailVerificationNotification::class,
        ],*/

	    Login::class => [
		    SuccessfulLogin::class,
	    ],
    ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot() {
        //
    }


}
