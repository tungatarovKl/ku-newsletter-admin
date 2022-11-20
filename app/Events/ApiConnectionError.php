<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApiConnectionError
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $errorMessage;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $errorMessage)
    {
        $this->errorMessage=$errorMessage;
    }

}
