<?php

namespace App\Containers\AppSection\Comment\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\Comment\Tasks\ListCommentsTask;
use App\Containers\AppSection\Comment\UI\API\Requests\ListCommentsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListCommentsAction extends ParentAction
{
    public function __construct(
        private readonly ListCommentsTask $listCommentsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListCommentsRequest $request): mixed
    {
        return $this->listCommentsTask->run();
    }
}
