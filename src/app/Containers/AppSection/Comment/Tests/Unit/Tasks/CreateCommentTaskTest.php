<?php

namespace App\Containers\AppSection\Comment\Tests\Unit\Tasks;

use App\Containers\AppSection\Comment\Events\CommentCreated;
use App\Containers\AppSection\Comment\Tasks\CreateCommentTask;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CreateCommentTask::class)]
class CreateCommentTaskTest extends UnitTestCase
{
    public function testCreateComment(): void
    {
        Event::fake();
        $data = [];

        $comment = app(CreateCommentTask::class)->run($data);

        $this->assertModelExists($comment);
        Event::assertDispatched(CommentCreated::class);
    }
}
