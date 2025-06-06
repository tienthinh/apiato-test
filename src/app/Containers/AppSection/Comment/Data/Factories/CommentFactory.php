<?php

namespace App\Containers\AppSection\Comment\Data\Factories;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Comment
 *
 * @extends ParentFactory<TModel>
 */
class CommentFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Comment::class;

    public function definition(): array
    {
        return [];
    }
}
