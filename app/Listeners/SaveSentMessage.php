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
        $newMessage = new Message;
        $newMessage->message_text=$event->message;
        $newMessage->save();
    }
}
