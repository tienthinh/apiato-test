<?php

namespace App\Containers\AppSection\Comment\Tests\Functional\API;

use App\Containers\AppSection\Comment\Data\Factories\CommentFactory;
use App\Containers\AppSection\Comment\Tests\Functional\ApiTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class DeleteCommentTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/comments/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testDeleteExistingComment(): void
    {
        $comment = CommentFactory::new()->createOne();

        $response = $this->injectId($comment->id)->makeCall();

        $response->assertNoContent();
    }

    public function testDeleteNonExistingComment(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testGivenHaveNoAccess_CannotDeleteComment(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     $comment = CommentFactory::new()->createOne();
    //
    //     $response = $this->injectId($comment->id)->makeCall();
    //
    //     $response->assertForbidden();
    // }
}
