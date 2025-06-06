<?php

namespace App\Containers\AppSection\Post\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Post\Tasks\ListPostsTask;
use App\Containers\AppSection\Post\UI\API\Requests\ListPostsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListPostsAction extends ParentAction
{
    public function __construct(
        private readonly ListPostsTask $listPostsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListPostsRequest $request): mixed
    {
        return $this->listPostsTask->run();
    }
}
