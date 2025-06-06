<?php

namespace App\Containers\AppSection\Post\Tasks;

use App\Containers\AppSection\Post\Data\Repositories\PostRepository;
use App\Containers\AppSection\Post\Events\PostDeleted;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeletePostTask extends ParentTask
{
    public function __construct(
        private readonly PostRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run($id): bool
    {
        $result = $this->repository->delete($id);
        PostDeleted::dispatch($result);

        return $result;
    }
}
