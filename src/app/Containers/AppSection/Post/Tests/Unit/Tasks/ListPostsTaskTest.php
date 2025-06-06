<?php

namespace App\Containers\AppSection\Post\Tests\Unit\Tasks;

use App\Containers\AppSection\Post\Data\Factories\PostFactory;
use App\Containers\AppSection\Post\Events\PostsListed;
use App\Containers\AppSection\Post\Tasks\ListPostsTask;
use App\Containers\AppSection\Post\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ListPostsTask::class)]
class ListPostsTaskTest extends UnitTestCase
{
    public function testListPosts(): void
    {
        Event::fake();
        PostFactory::new()->count(3)->create();

        $foundPosts = app(ListPostsTask::class)->run();

        $this->assertCount(3, $foundPosts);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundPosts);
        Event::assertDispatched(PostsListed::class);
    }
}
