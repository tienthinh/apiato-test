<?php

namespace App\Containers\AppSection\Post\Tests\Unit\Tasks;

use App\Containers\AppSection\Post\Data\Factories\PostFactory;
use App\Containers\AppSection\Post\Events\PostUpdated;
use App\Containers\AppSection\Post\Tasks\UpdatePostTask;
use App\Containers\AppSection\Post\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(UpdatePostTask::class)]
class UpdatePostTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdatePost(): void
    {
        Event::fake();
        $post = PostFactory::new()->createOne();
        $data = [
            // 'some_field' => 'new_field_data',
        ];

        $updatedPost = app(UpdatePostTask::class)->run($data, $post->id);

        $this->assertEquals($post->id, $updatedPost->id);
        // $this->assertEquals($data['some_field'], $updatedPost->some_field);
        Event::assertDispatched(PostUpdated::class);
    }
}
