<?php

namespace App\Containers\AppSection\Post\Tests\Unit\Factories;

use App\Containers\AppSection\Post\Data\Factories\PostFactory;
use App\Containers\AppSection\Post\Models\Post;
use App\Containers\AppSection\Post\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(PostFactory::class)]
class PostFactoryTest extends UnitTestCase
{
    public function testCreatePost(): void
    {
        $post = PostFactory::new()->make();

        $this->assertInstanceOf(Post::class, $post);
    }
}
