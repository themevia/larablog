<?php

namespace App\Listeners;

use App\Events\decreaseReactionPostCount;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class decreasePostLikeCount
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
     * @param  decreaseReactionPostCount  $event
     * @return void
     */
    public function handle(decreaseReactionPostCount $event)
    {
        if ($event->counted['type']) {
            (new Post())->decreaseColumn($event->counted['reaction_id'],'like_count');
        } elseif (!$event->counted['type']) {
            (new Post())->decreaseColumn($event->counted['reaction_id'],'dislike_count');
        }
    }
}
