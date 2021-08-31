<?php

namespace App\Listeners;

use App\Events\updateReactionPostCount;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class updatePostLikeCount
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
     * @param  updateReactionPostCount  $event
     * @return void
     */
    public function handle(updateReactionPostCount $event)
    {
        if ($event->counted['type']) {
            (new Post())->decreaseColumn($event->counted['reaction_id'],'dislike_count');
            (new Post())->increaseColumn($event->counted['reaction_id'],'like_count');
        } elseif (!$event->counted['type']) {
            (new Post())->increaseColumn($event->counted['reaction_id'],'dislike_count');
            (new Post())->decreaseColumn($event->counted['reaction_id'],'like_count');
        }
    }
}
