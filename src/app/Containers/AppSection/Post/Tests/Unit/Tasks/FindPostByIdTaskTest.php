<?php

namespace App\Containers\AppSection\Post\Tests\Unit\Tasks;

use App\Containers\AppSection\Post\Data\Factories\PostFactory;
use App\Containers\AppSection\Post\Events\PostRequested;
use App\Containers\AppSection\Post\Tasks\FindPostByIdTask;
use App\Containers\AppSection\Post\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FindPostByIdTask::class)]
class FindPostByIdTaskTest extends UnitTestCase
{
    public function testFindPostById(): void
    {
        Event::fake();
        $post = PostFactory::new()->createOne();

        $foundPost = app(FindPostByIdTask::class)->run($post->id);

        $this->assertEquals($post->id, $foundPost->id);
        Event::assertDispatched(PostRequested::class);
    }
}
