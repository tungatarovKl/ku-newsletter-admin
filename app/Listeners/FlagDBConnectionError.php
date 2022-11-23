<?php

namespace App\Listeners;

use App\Events\DBConnectionError;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class FlagDBConnectionError
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Log::channel('stderr')->error('Database connection error', ['message' => $event->errorMessage]);
    }
}
