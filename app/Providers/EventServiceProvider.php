<?php

namespace App\Providers;

use App\Events\ChirpCreated;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\ServiceProvider;
use App\Listeners\SendChirpCreatedNotifications;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;


class EventServiceProvider extends ServiceProvider
{

    // protected $listen = [

    //     ChirpCreated::class => [

    //         SendChirpCreatedNotifications::class,
    //     ],
    //     Registered::class => [

    //         SendEmailVerificationNotification::class
    //     ],
    // ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Event::listen(ChirpCreated::class, SendChirpCreatedNotifications::class, SendEmailVerificationNotification::class);
    }
}
