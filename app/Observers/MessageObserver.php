<?php

namespace App\Observers;

use App\Chat;
use App\Message;
use App\Events\MessageSentEvent;

class MessageObserver
{
    /**
     * Handle the Message "created" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function created(Message $message)
    {
        $chat = Chat::where('user_id', $message->from_id)
                    ->where('contact_id', $message->to_id)
                    ->firstOrFail();

        $chat->last_message = "You: $message->content";
        $chat->last_time    = $message->created_at;
        $chat->save();

        $chat = Chat::where('contact_id', $message->from_id)
                    ->where('user_id', $message->to_id)
                    ->firstOrFail();
                
        $chat->last_message = "$chat->contact_name: $message->content";
        $chat->last_time    = $message->created_at;
        $chat->save();

        event( new MessageSentEvent($message) );
    }
}