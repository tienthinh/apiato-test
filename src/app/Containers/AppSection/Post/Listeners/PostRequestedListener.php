<?php

namespace App\Containers\AppSection\Post\Listeners;

use App\Containers\AppSection\Post\Events\PostRequested;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostRequestedListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function __invoke(PostRequested $event): void
    {
    }
}
