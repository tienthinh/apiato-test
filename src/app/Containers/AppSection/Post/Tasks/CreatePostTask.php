<?php

namespace App\Containers\AppSection\Post\Tasks;

use App\Containers\AppSection\Post\Data\Repositories\PostRepository;
use App\Containers\AppSection\Post\Events\PostCreated;
use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreatePostTask extends ParentTask
{
    public function __construct(
        private readonly PostRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Post
    {
        try {
            $post = $this->repository->create($data);
            PostCreated::dispatch($post);

            return $post;
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
