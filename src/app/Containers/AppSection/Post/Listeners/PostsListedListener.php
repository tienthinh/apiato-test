<?php

namespace App\Containers\AppSection\Post\Listeners;

use App\Containers\AppSection\Post\Events\PostsListed;
use App\Ship\Parents\Listeners\Listener as ParentListener;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostsListedListener extends ParentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function __invoke(PostsListed $event): void
    {
    }
}
