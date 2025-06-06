<?php

namespace App\Containers\AppSection\Comment\Events;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;

class CommentCreated extends ParentEvent
{
    public function __construct(
        public readonly Comment $comment,
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
