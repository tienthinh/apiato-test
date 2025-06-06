<?php

namespace App\Containers\AppSection\Post\Data\Factories;

use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Post
 *
 * @extends ParentFactory<TModel>
 */
class PostFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Post::class;

    public function definition(): array
    {
        return [];
    }
}
