<?php

namespace App\Containers\AppSection\Post\Tasks;

use App\Containers\AppSection\Post\Data\Repositories\PostRepository;
use App\Containers\AppSection\Post\Events\PostRequested;
use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindPostByIdTask extends ParentTask
{
    public function __construct(
        private readonly PostRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Post
    {
        try {
            $post = $this->repository->find($id);
            PostRequested::dispatch($post);

            return $post;
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
