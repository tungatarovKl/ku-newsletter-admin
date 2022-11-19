<?php

namespace App\Providers;

use App\Events\MessageSentSuccessful;
use App\Events\ApiConnectionError;
use App\Events\ApiResponseError;
use App\Listeners\FlagResponseError;
use App\Listeners\SaveSentMessage;
use App\Listeners\FlagConnectionError;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        MessageSentSuccessful::class =>[
            SaveSentMessage::class,
        ],
        ApiConnectionError::class =>[
            FlagConnectionError::class,
        ],
        ApiResponseError::class =>[
            FlagResponseError::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
