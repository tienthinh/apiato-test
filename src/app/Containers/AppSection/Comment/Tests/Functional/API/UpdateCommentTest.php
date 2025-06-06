<?php

namespace App\Containers\AppSection\Comment\Tests\Functional\API;

use App\Containers\AppSection\Comment\Data\Factories\CommentFactory;
use App\Containers\AppSection\Comment\Tests\Functional\ApiTestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
class UpdateCommentTest extends ApiTestCase
{
    protected string $endpoint = 'patch@v1/comments/{id}';

    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    // TODO TEST
    public function testUpdateExistingComment(): void
    {
        $comment = CommentFactory::new()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->injectId($comment->id)->makeCall($data);

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.object', 'Comment')
                    ->where('data.id', $comment->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }

    public function testUpdateNonExistingComment(): void
    {
        $invalidId = 7777;

        $response = $this->injectId($invalidId)->makeCall([]);

        $response->assertNotFound();
    }

    // TODO TEST
    // public function testUpdateExistingCommentWithEmptyValues(): void
    // {
    //     $comment = CommentFactory::new()->createOne();
    //     $data = [
    //         // add some fillable fields here
    //         // 'first_field' => '',
    //         // 'second_field' => '',
    //     ];
    //
    //     $response = $this->injectId($comment->id)->makeCall($data);
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
