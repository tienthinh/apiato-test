<?php

namespace App\Containers\AppSection\Comment\Tests\Functional\API;

use App\Containers\AppSection\Comment\Data\Factories\CommentFactory;
use App\Containers\AppSection\Comment\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class FindCommentByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/comments/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testFindComment(): void
    {
        $comment = CommentFactory::new()->createOne();

        $response = $this->injectId($comment->id)->makeCall();

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $this->encode($comment->id))
                    ->etc()
        );
    }

    public function testFindNonExistingComment(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    public function testFindFilteredCommentResponse(): void
    {
        $comment = CommentFactory::new()->createOne();

        $response = $this->injectId($comment->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $comment->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
    // public function testFindCommentWithRelation(): void
    // {
    //     $comment = CommentFactory::new()->createOne();
    //     $relation = 'roles';
    //
    //     $response = $this->injectId($comment->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //           $json->has('data')
    //               ->where('data.id', $comment->getHashedKey())
    //               ->count("data.$relation.data", 1)
    //               ->where("data.$relation.data.0.name", 'something')
    //               ->etc()
    //     );
    // }
}
