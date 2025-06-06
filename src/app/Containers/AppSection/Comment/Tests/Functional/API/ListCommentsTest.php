<?php

namespace App\Containers\AppSection\Comment\Tests\Functional\API;

use App\Containers\AppSection\Comment\Data\Factories\CommentFactory;
use App\Containers\AppSection\Comment\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class ListCommentsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/comments';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testListCommentsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        CommentFactory::new()->count(2)->create();

        $response = $this->makeCall();

        $response->assertOk();
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testListCommentsByNonAdmin(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     CommentFactory::new()->count(2)->create();
    //
    //     $response = $this->makeCall();
    //
    //     $response->assertForbidden();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('message')
    //                 ->where('message', 'This action is unauthorized.')
    //                 ->etc()
    //     );
    // }

    // TODO TEST
    // public function testSearchCommentsByFields(): void
    // {
    //     CommentFactory::new()->count(3)->create();
    //     // create a model with specific field values
    //     $comment = CommentFactory::new()->create([
    //         // 'name' => 'something',
    //     ]);
    //
    //     // search by the above values
    //     $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($comment->name))->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                 // ->where('data.0.name', $comment->name)
    //                 ->etc()
    //     );
    // }

    // TODO TEST
    // public function testSearchCommentsByHashID(): void
    // {
    //     $comments = CommentFactory::new()->count(3)->create();
    //     $secondComment = $comments[1];
    //
    //     $response = $this->endpoint($this->endpoint . '?search=id:' . $secondComment->getHashedKey())->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                  ->where('data.0.id', $secondComment->getHashedKey())
    //                 ->etc()
    //     );
    // }
}
