<?php

namespace App\Containers\AppSection\Post\Providers;

use App\Containers\AppSection\Post\Events\PostsListed;
use App\Containers\AppSection\Post\Events\PostRequested;
use App\Containers\AppSection\Post\Events\PostCreated;
use App\Containers\AppSection\Post\Events\PostUpdated;
use App\Containers\AppSection\Post\Events\PostDeleted;
use App\Containers\AppSection\Post\Listeners\PostsListedListener;
use App\Containers\AppSection\Post\Listeners\PostRequestedListener;
use App\Containers\AppSection\Post\Listeners\PostCreatedListener;
use App\Containers\AppSection\Post\Listeners\PostUpdatedListener;
use App\Containers\AppSection\Post\Listeners\PostDeletedListener;

use App\Ship\Parents\Providers\EventServiceProvider as ParentEventServiceProvider;

class EventServiceProvider extends ParentEventServiceProvider
{
    protected $listen = [
        PostsListedListener::class => [
            PostsListed::class,
        ],
        PostRequestedListener::class => [
            PostRequested::class,
        ],
        PostCreatedListener::class => [
            PostCreated::class,
        ],
        PostUpdatedListener::class => [
            PostUpdated::class,
        ],
        PostDeletedListener::class => [
            PostDeleted::class,
        ],
    ];
}
