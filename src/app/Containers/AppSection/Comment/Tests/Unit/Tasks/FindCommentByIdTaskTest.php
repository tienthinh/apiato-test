<?php

namespace App\Containers\AppSection\Comment\Tests\Unit\Tasks;

use App\Containers\AppSection\Comment\Data\Factories\CommentFactory;
use App\Containers\AppSection\Comment\Events\CommentRequested;
use App\Containers\AppSection\Comment\Tasks\FindCommentByIdTask;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FindCommentByIdTask::class)]
class FindCommentByIdTaskTest extends UnitTestCase
{
    public function testFindCommentById(): void
    {
        Event::fake();
        $comment = CommentFactory::new()->createOne();

        $foundComment = app(FindCommentByIdTask::class)->run($comment->id);

        $this->assertEquals($comment->id, $foundComment->id);
        Event::assertDispatched(CommentRequested::class);
    }
}
