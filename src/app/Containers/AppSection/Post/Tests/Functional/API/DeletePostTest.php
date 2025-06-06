<?php

namespace App\Containers\AppSection\Post\Tests\Functional\API;

use App\Containers\AppSection\Post\Data\Factories\PostFactory;
use App\Containers\AppSection\Post\Tests\Functional\ApiTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class DeletePostTest extends ApiTestCase
{
    protected string $endpoint = 'delete@v1/posts/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testDeleteExistingPost(): void
    {
        $post = PostFactory::new()->createOne();

        $response = $this->injectId($post->id)->makeCall();

        $response->assertNoContent();
    }

    public function testDeleteNonExistingPost(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testGivenHaveNoAccess_CannotDeletePost(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     $post = PostFactory::new()->createOne();
    //
    //     $response = $this->injectId($post->id)->makeCall();
    //
    //     $response->assertForbidden();
    // }
}
