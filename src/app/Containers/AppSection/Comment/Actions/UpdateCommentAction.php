<?php

namespace App\Containers\AppSection\Comment\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Comment\Models\Comment;
use App\Containers\AppSection\Comment\Tasks\UpdateCommentTask;
use App\Containers\AppSection\Comment\UI\API\Requests\UpdateCommentRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateCommentAction extends ParentAction
{
    public function __construct(
        private readonly UpdateCommentTask $updateCommentTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateCommentRequest $request): Comment
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateCommentTask->run($data, $request->id);
    }
}
