<?php

namespace App\Listeners;

use App\Events\decreaseCommentPostCount;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class decreasePostCommentCount
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
     * @param  decreaseCommentPostCount  $event
     * @return void
     */
    public function handle(decreaseCommentPostCount $event)
    {
        if ($event->counted['table_name'] == 'posts')
            (new Post())->decreaseColumn($event->counted['table_id'],'comment_count');
    }
}
