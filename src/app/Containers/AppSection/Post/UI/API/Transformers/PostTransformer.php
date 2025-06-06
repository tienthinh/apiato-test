<?php

namespace App\Containers\AppSection\Post\UI\API\Transformers;

use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Primitive;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;

class PostTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [
        'user',
    ];

    public function transform(Post $post): array
    {
        return [
            'object' => $post->getResourceKey(),
            'id' => $post->getHashedKey(),
            'title' => $post->title,
            'content' => $post->content,
            'user_id' => $post->user_id,
            // 'likes_count' => $post->likes()->count(),
            // 'comments_count' => $post->comments()->count(),
            // 'is_liked' => auth()->check() ? $post->isLikedByUser(auth()->id()) : false,
            'created_at' => $post->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $post->updated_at?->format('Y-m-d H:i:s'),
            'deleted_at' => $post->deleted_at?->format('Y-m-d H:i:s'),
            'readable_created_at' => $post->created_at?->diffForHumans(),
            'readable_updated_at' => $post->updated_at?->diffForHumans(),
        ];
    }

    public function includeUser(Post $post): Primitive|Item
    {
        // return $this->item($post->user, new UserTransformer());
        return $this->nullableItem($post->user, new UserTransformer());
    }

    // public function includeComments(Post $post): Collection
    // {
    //     return $this->collection($post->comments, new CommentTransformer());
    // }

    // public function includeLikes(Post $post): Collection
    // {
    //     return $this->collection($post->likes, new LikeTransformer());
    // }
}
