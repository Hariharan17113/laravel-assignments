<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostDeleted extends Mailable
{
    use Queueable, SerializesModels;
    public $post,$user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post,$user)
    {
        $this->post=$post;
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.post.deletedMarkdown');
    }
}
