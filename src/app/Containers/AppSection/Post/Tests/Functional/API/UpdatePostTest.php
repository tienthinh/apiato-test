<?php

namespace App\Containers\AppSection\Post\Tests\Functional\API;

use App\Containers\AppSection\Post\Data\Factories\PostFactory;
use App\Containers\AppSection\Post\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class UpdatePostTest extends ApiTestCase
{
    protected string $endpoint = 'patch@v1/posts/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    // TODO TEST
    public function testUpdateExistingPost(): void
    {
        $post = PostFactory::new()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->injectId($post->id)->makeCall($data);

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'Post')
                    ->where('data.id', $post->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }

    public function testUpdateNonExistingPost(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    // TODO TEST
    // public function testUpdateExistingPostWithEmptyValues(): void
    // {
    //     $post = PostFactory::new()->createOne();
    //     $data = [
    //         // add some fillable fields here
    //         // 'first_field' => '',
    //         // 'second_field' => '',
    //     ];
    //
    //     $response = $this->injectId($post->id)->makeCall($data);
    //
    //     $response->assertUnprocessable();
    //     $response->assertJson(
    //         fn (AssertableJson $json) =>
    //         $json->has('errors')
    //             // ->where('errors.first_field.0', 'assert validation errors')
    //             // ->where('errors.second_field.0', 'assert validation errors')
    //             ->etc()
    //     );
    // }
}
