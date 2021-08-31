<?php

namespace App\Listeners;

use App\Events\increaseCommentPostCount;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class increasePostCommentCount
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
     * @param  increaseCommentPostCount  $event
     * @return void
     */
    public function handle(increaseCommentPostCount $event)
    {
        if ($event->counted['table_name'])
            (new Post())->increaseColumn($event->counted['table_id'],'like_count');
    }
}
