<?php

namespace App\Listeners;

use App\Events\PostUpdated;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendPostUpdateMail implements ShouldQueue
{
    use Queueable,InteractsWithQueue;

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
     * @param  PostUpdated  $event
     * @return void
     */
    public function handle(PostUpdated $event)
    {
        $user = User::find($event->post->user_id);
        Mail::send('mail.post.updated', compact('user'), function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Post Updated');
        });
    }
}
