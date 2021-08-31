<?php

namespace App\Events;

use App\Models\Reaction, Illuminate\Broadcasting\Channel,
    Illuminate\Broadcasting\InteractsWithSockets,
    Illuminate\Broadcasting\PresenceChannel,
    Illuminate\Broadcasting\PrivateChannel,
    Illuminate\Contracts\Broadcasting\ShouldBroadcast,
    Illuminate\Foundation\Events\Dispatchable,
    Illuminate\Queue\SerializesModels;

class updateReactionPostCount
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $counted;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Reaction $counted)
    {
        $this->counted = $counted->toArray();
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
