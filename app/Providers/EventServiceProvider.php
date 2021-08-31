<?php

namespace App\Providers;

use App\Events\decreaseReactionPostCount;
use App\Events\decreaseCommentPostCount;
use App\Events\increaseReactionPostCount;
use App\Events\increaseCommentPostCount;
use App\Events\updateReactionPostCount;
use App\Listeners\decreasePostLikeCount;
use App\Listeners\decreasePostCommentCount;
use App\Listeners\increasePostLikeCount;
use App\Listeners\increasePostCommentCount;
use App\Listeners\updatePostLikeCount;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

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
        increaseReactionPostCount::class => [
            increasePostLikeCount::class,
        ],
        decreaseReactionPostCount::class => [
            decreasePostLikeCount::class,
        ],
        updateReactionPostCount::class => [
            updatePostLikeCount::class,
        ],
        increaseCommentPostCount::class => [
            increasePostCommentCount::class,
        ],
        decreaseCommentPostCount::class => [
            decreasePostCommentCount::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
