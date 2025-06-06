<?php

namespace App\Containers\AppSection\Post\Actions;

use App\Containers\AppSection\Post\Tasks\DeletePostTask;
use App\Containers\AppSection\Post\UI\API\Requests\DeletePostRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeletePostAction extends ParentAction
{
    public function __construct(
        private readonly DeletePostTask $deletePostTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeletePostRequest $request): int
    {
        return $this->deletePostTask->run($request->id);
    }
}
