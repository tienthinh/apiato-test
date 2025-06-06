<?php

namespace App\Containers\AppSection\Comment\Providers;

use App\Containers\AppSection\Comment\Events\CommentsListed;
use App\Containers\AppSection\Comment\Events\CommentRequested;
use App\Containers\AppSection\Comment\Events\CommentCreated;
use App\Containers\AppSection\Comment\Events\CommentUpdated;
use App\Containers\AppSection\Comment\Events\CommentDeleted;
use App\Containers\AppSection\Comment\Listeners\CommentsListedListener;
use App\Containers\AppSection\Comment\Listeners\CommentRequestedListener;
use App\Containers\AppSection\Comment\Listeners\CommentCreatedListener;
use App\Containers\AppSection\Comment\Listeners\CommentUpdatedListener;
use App\Containers\AppSection\Comment\Listeners\CommentDeletedListener;

use App\Ship\Parents\Providers\EventServiceProvider as ParentEventServiceProvider;

class EventServiceProvider extends ParentEventServiceProvider
{
    protected $listen = [
        CommentsListedListener::class => [
            CommentsListed::class,
        ],
        CommentRequestedListener::class => [
            CommentRequested::class,
        ],
        CommentCreatedListener::class => [
            CommentCreated::class,
        ],
        CommentUpdatedListener::class => [
            CommentUpdated::class,
        ],
        CommentDeletedListener::class => [
            CommentDeleted::class,
        ],
    ];
}
