<?php

namespace App\Providers;

use App\Models\Call;
use App\Observers\CallObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Event\CallCreateEvent' => [
            'App\Listeners\CallCreateListener'
        ],
        'App\Event\CallUpdatedEvent' => [
            'App\Listeners\CallUpdatedListener'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Call::observe(CallObserver::class);
    }
}
