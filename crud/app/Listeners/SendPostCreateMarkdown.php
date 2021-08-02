<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class SendPostCreateMarkdown implements ShouldQueue
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
     * @param  PostCreated  $event
     * @return void
     */

    public function handle(PostCreated $event)
    {
        $user = User::find($event->post->user_id);
        Mail::to($user->email)->send(new \App\Mail\PostCreated($event->post, $user));
    }
}
