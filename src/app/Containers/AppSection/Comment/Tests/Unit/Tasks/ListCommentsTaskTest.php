<?php

namespace App\Containers\AppSection\Comment\Tests\Unit\Tasks;

use App\Containers\AppSection\Comment\Data\Factories\CommentFactory;
use App\Containers\AppSection\Comment\Events\CommentsListed;
use App\Containers\AppSection\Comment\Tasks\ListCommentsTask;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ListCommentsTask::class)]
class ListCommentsTaskTest extends UnitTestCase
{
    public function testListComments(): void
    {
        Event::fake();
        CommentFactory::new()->count(3)->create();

        $foundComments = app(ListCommentsTask::class)->run();

        $this->assertCount(3, $foundComments);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundComments);
        Event::assertDispatched(CommentsListed::class);
    }
}
