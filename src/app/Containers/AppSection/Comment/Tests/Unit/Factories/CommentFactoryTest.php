<?php

namespace App\Containers\AppSection\Comment\Tests\Unit\Factories;

use App\Containers\AppSection\Comment\Data\Factories\CommentFactory;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CommentFactory::class)]
class CommentFactoryTest extends UnitTestCase
{
    public function testCreateComment(): void
    {
        $comment = CommentFactory::new()->make();

        $this->assertInstanceOf(Comment::class, $comment);
    }
}
