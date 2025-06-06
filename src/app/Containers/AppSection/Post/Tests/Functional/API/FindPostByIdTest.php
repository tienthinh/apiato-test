<?php

namespace App\Containers\AppSection\Post\Tests\Functional\API;

use App\Containers\AppSection\Post\Data\Factories\PostFactory;
use App\Containers\AppSection\Post\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class FindPostByIdTest extends ApiTestCase
{
    protected string $endpoint = 'get@v1/posts/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    public function testFindPost(): void
    {
        $post = PostFactory::new()->createOne();

        $response = $this->injectId($post->id)->makeCall();

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $this->encode($post->id))
                    ->etc()
        );
    }

    public function testFindNonExistingPost(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    public function testFindFilteredPostResponse(): void
    {
        $post = PostFactory::new()->createOne();

        $response = $this->injectId($post->id)->endpoint($this->endpoint . '?filter=id')->makeCall();

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $post->getHashedKey())
                    ->missing('data.object')
        );
    }

    // TODO TEST
    // if your model have relationships which can be included into the response then
    // uncomment this test
    // modify it to your needs
    // test the relation
    // public function testFindPostWithRelation(): void
    // {
    //     $post = PostFactory::new()->createOne();
    //     $relation = 'roles';
    //
    //     $response = $this->injectId($post->id)->endpoint($this->endpoint . "?include=$relation")->makeCall();
    //
    //     $response->assertOk();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //           $json->has('data')
    //               ->where('data.id', $post->getHashedKey())
    //               ->count("data.$relation.data", 1)
    //               ->where("data.$relation.data.0.name", 'something')
    //               ->etc()
    //     );
    // }
}
