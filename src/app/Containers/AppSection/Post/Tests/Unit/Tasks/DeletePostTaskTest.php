<?php

namespace App\Containers\AppSection\Post\Tests\Unit\Tasks;

use App\Containers\AppSection\Post\Data\Factories\PostFactory;
use App\Containers\AppSection\Post\Events\PostDeleted;
use App\Containers\AppSection\Post\Tasks\DeletePostTask;
use App\Containers\AppSection\Post\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DeletePostTask::class)]
class DeletePostTaskTest extends UnitTestCase
{
    public function testDeletePost(): void
    {
        Event::fake();
        $post = PostFactory::new()->createOne();

        $result = app(DeletePostTask::class)->run($post->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(PostDeleted::class);
    }
}
