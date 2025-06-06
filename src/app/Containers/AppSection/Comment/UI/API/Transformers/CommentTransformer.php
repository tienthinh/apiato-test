<?php

namespace App\Containers\AppSection\Comment\UI\API\Transformers;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class CommentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Comment $comment): array
    {
        return [
            'object' => $comment->getResourceKey(),
            'id' => $comment->getHashedKey(),
            'created_at' => $comment->created_at,
            'updated_at' => $comment->updated_at,
            'readable_created_at' => $comment->created_at->diffForHumans(),
            'readable_updated_at' => $comment->updated_at->diffForHumans(),
        ];
    }
}
