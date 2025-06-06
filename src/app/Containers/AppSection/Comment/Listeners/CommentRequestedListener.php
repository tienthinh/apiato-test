<?php

namespace App\Containers\AppSection\Comment\Listeners;

use App\Containers\AppSection\Comment\Events\CommentRequested;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentRequestedListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function __invoke(CommentRequested $event): void
    {
    }
}
