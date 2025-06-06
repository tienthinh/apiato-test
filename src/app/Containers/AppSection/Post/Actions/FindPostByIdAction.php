<?php

namespace App\Containers\AppSection\Post\Actions;

use App\Containers\AppSection\Post\Models\Post;
use App\Containers\AppSection\Post\Tasks\FindPostByIdTask;
use App\Containers\AppSection\Post\UI\API\Requests\FindPostByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindPostByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindPostByIdTask $findPostByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindPostByIdRequest $request): Post
    {
        return $this->findPostByIdTask->run($request->id);
    }
}
