<?php

namespace App\Containers\AppSection\Comment\Actions;

use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\Tasks\FindCommentByIdTask;
use App\Containers\AppSection\Comment\UI\API\Requests\FindCommentByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindCommentByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindCommentByIdTask $findCommentByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindCommentByIdRequest $request): Comment
    {
        return $this->findCommentByIdTask->run($request->id);
    }
}
