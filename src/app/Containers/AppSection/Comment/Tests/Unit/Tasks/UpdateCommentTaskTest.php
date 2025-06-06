<?php

namespace App\Containers\AppSection\Comment\Tests\Unit\Tasks;

use App\Containers\AppSection\Comment\Data\Factories\CommentFactory;
use App\Containers\AppSection\Comment\Events\CommentUpdated;
use App\Containers\AppSection\Comment\Tasks\UpdateCommentTask;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(UpdateCommentTask::class)]
class UpdateCommentTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateComment(): void
    {
        Event::fake();
        $comment = CommentFactory::new()->createOne();
        $data = [
            // 'some_field' => 'new_field_data',
        ];

        $updatedComment = app(UpdateCommentTask::class)->run($data, $comment->id);

        $this->assertEquals($comment->id, $updatedComment->id);
        // $this->assertEquals($data['some_field'], $updatedComment->some_field);
        Event::assertDispatched(CommentUpdated::class);
    }
}
