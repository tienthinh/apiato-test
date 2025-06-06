<?php

namespace App\Containers\AppSection\Post\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\Post\Models\Post;
use App\Containers\AppSection\Post\Tasks\CreatePostTask;
use App\Containers\AppSection\Post\UI\API\Requests\CreatePostRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreatePostAction extends ParentAction
{
    public function __construct(
        private readonly CreatePostTask $createPostTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreatePostRequest $request): Post
    {
        $data = $request->sanitizeInput([
            'title',
            'content',
        ]);

        $data['user_id'] = $request->user()->id;

        return $this->createPostTask->run($data);
    }
}
