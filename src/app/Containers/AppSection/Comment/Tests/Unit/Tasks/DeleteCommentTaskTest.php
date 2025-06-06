<?php

namespace App\Containers\AppSection\Comment\Tests\Unit\Tasks;

use App\Containers\AppSection\Comment\Data\Factories\CommentFactory;
use App\Containers\AppSection\Comment\Events\CommentDeleted;
use App\Containers\AppSection\Comment\Tasks\DeleteCommentTask;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DeleteCommentTask::class)]
class DeleteCommentTaskTest extends UnitTestCase
{
    public function testDeleteComment(): void
    {
        Event::fake();
        $comment = CommentFactory::new()->createOne();

        $result = app(DeleteCommentTask::class)->run($comment->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(CommentDeleted::class);
    }
}
