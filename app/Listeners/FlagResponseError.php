<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class FlagResponseError
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $response=$event->response;
        Log::channel('stderr')->error('API response error', [
            'api_request_url' => $response->effectiveUri(),
            'api_response_status_code' => $response->status(),
            'api_response_body' => $response->body()]);
        
    }
}
