<?php

namespace App\Listeners;
use App\Models\Message;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveSentMessage
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $message = $event->message;

        $newMessage = new Message;
        $newMessage->message_text=$message;
        $newMessage->save();
    }
}
