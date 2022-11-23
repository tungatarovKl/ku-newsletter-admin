<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSentSuccessful
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $sender;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $message, string $sender)
    {
        $this->message = $message;
        $this->sender = $sender;
    }

}
