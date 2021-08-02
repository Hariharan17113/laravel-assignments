<?php

namespace App\Listeners;

use App\Events\PostDeleted;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPostDeleteMail implements ShouldQueue
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
     * @param  PostDeleted  $event
     * @return void
     */
    public function handle(PostDeleted $event)
    {
        $user = User::find($event->post->user_id);
        Mail::send('mail.post.deleted', compact('user'), function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Post Deleted');
        });
    }
}
