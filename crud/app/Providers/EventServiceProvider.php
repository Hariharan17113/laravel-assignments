<?php

namespace App\Providers;
use App\Events\PostEdited;
use App\Listeners\SendPostEditNotification;
use App\Mail\PostCreated;
use App\Mail\PostDeleted;
use App\Mail\PostUpdated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\PostCreated' => [
            'App\Listeners\SendPostCreateMail',
            'App\Listeners\SendPostCreateMarkdown',
        ],
        'App\Events\PostUpdated' => [
            'App\Listeners\SendPostUpdateMail',
            'App\Listeners\SendPostUpdateMarkdown',
        ],
        'App\Events\PostDeleted' => [
            'App\Listeners\SendPostDeleteMail',
            'App\Listeners\SendPostDeleteMarkdown',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen(function (PostEdited $event) {
            //
        });
    }
}
