<?php

namespace App\Containers\AppSection\Comment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\Tasks\CreateCommentTask;
use App\Containers\AppSection\Comment\UI\API\Requests\CreateCommentRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateCommentAction extends ParentAction
{
    public function __construct(
        private readonly CreateCommentTask $createCommentTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateCommentRequest $request): Comment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createCommentTask->run($data);
    }
}
