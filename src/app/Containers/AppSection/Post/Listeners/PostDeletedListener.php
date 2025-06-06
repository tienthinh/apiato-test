<?php

namespace App\Containers\AppSection\Post\Listeners;

use App\Containers\AppSection\Post\Events\PostDeleted;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostDeletedListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function __invoke(PostDeleted $event): void
    {
    }
}
