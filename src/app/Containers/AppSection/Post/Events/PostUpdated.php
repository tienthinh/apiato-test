<?php

namespace App\Containers\AppSection\Post\Events;

use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class PostUpdated extends ParentEvent
{
    public function __construct(
        public readonly Post $post,
    ) {
    }

    /**
     * @return Channel[]
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
