<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class SendPostCreateMarkdown
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
//         dd($event->post);
        $user=Auth::user();
        Mail::to(Auth::user()->email)->send(new \App\Mail\PostCreated($event->post, $user));
    }
}
