<?php

namespace App\Listeners;

use App\Events\increaseReactionPostCount;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class increasePostLikeCount
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
     * @param  increaseReactionPostCount  $event
     * @return void
     */
    public function handle(increaseReactionPostCount $event)
    {
        if ($event->counted['type']) {
            (new Post())->increaseColumn($event->counted['reaction_id'],'like_count');
        } elseif (!$event->counted['type']) {
            (new Post())->increaseColumn($event->counted['reaction_id'],'dislike_count');
        }
    }
}
