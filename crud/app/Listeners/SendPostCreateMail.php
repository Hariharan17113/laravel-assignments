<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendPostCreateMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $user = Auth::user()->toArray();
        Mail::send('mail.post.created', compact('user'), function($message) use ($user) {
            $message->to($user['email']);
            $message->subject('Event Testing');
        });
    }
}
