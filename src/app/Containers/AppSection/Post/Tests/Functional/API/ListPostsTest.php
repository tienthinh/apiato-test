<?php

namespace App\Containers\AppSection\Post\Tests\Functional\API;

use App\Containers\AppSection\Post\Data\Factories\PostFactory;
use App\Containers\AppSection\Post\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class ListPostsTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/posts';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testListPostsByAdmin(): void
    {
        $this->getTestingUserWithoutAccess(createUserAsAdmin: true);
        PostFactory::new()->count(2)->create();

        $response = $this->makeCall();

        $response->assertOk();
        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    // TODO TEST
    // add some roles and permissions to this route's request
    // then add them to the $access array above
    // uncomment this test to test accesses
    // public function testListPostsByNonAdmin(): void
    // {
    //     $this->getTestingUserWithoutAccess();
    //     PostFactory::new()->count(2)->create();
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
    // public function testSearchPostsByFields(): void
    // {
    //     PostFactory::new()->count(3)->create();
    //     // create a model with specific field values
    //     $post = PostFactory::new()->create([
    //         // 'name' => 'something',
    //     ]);
    //
    //     // search by the above values
    //     $response = $this->endpoint($this->endpoint . "?search=name:" . urlencode($post->name))->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                 // ->where('data.0.name', $post->name)
    //                 ->etc()
    //     );
    // }

    // TODO TEST
    // public function testSearchPostsByHashID(): void
    // {
    //     $posts = PostFactory::new()->count(3)->create();
    //     $secondPost = $posts[1];
    //
    //     $response = $this->endpoint($this->endpoint . '?search=id:' . $secondPost->getHashedKey())->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //             $json->has('data')
    //                  ->where('data.0.id', $secondPost->getHashedKey())
    //                 ->etc()
    //     );
    // }
}
