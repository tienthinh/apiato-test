<?php

namespace App\Containers\AppSection\Comment\Listeners;

use App\Containers\AppSection\Comment\Events\CommentDeleted;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentDeletedListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function __invoke(CommentDeleted $event): void
    {
    }
}
