<?php

namespace App\Containers\AppSection\Post\Listeners;

use App\Containers\AppSection\Post\Events\PostUpdated;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostUpdatedListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function __invoke(PostUpdated $event): void
    {
    }
}
