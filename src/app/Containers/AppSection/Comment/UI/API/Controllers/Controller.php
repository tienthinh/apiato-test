<?php

namespace App\Containers\AppSection\Comment\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Comment\Actions\CreateCommentAction;
use App\Containers\AppSection\Comment\Actions\DeleteCommentAction;
use App\Containers\AppSection\Comment\Actions\FindCommentByIdAction;
use App\Containers\AppSection\Comment\Actions\ListCommentsAction;
use App\Containers\AppSection\Comment\Actions\UpdateCommentAction;
use App\Containers\AppSection\Comment\UI\API\Requests\CreateCommentRequest;
use App\Containers\AppSection\Comment\UI\API\Requests\DeleteCommentRequest;
use App\Containers\AppSection\Comment\UI\API\Requests\FindCommentByIdRequest;
use App\Containers\AppSection\Comment\UI\API\Requests\ListCommentsRequest;
use App\Containers\AppSection\Comment\UI\API\Requests\UpdateCommentRequest;
use App\Containers\AppSection\Comment\UI\API\Transformers\CommentTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    /**
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function create(CreateCommentRequest $request, CreateCommentAction $action): JsonResponse
    {
        $comment = $action->run($request);

        return $this->created($this->transform($comment, CommentTransformer::class));
    }

    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
    */
    public function findById(FindCommentByIdRequest $request, FindCommentByIdAction $action): array
    {
    $comment = $action->run($request);

    return $this->transform($comment, CommentTransformer::class);
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function list(ListCommentsRequest $request, ListCommentsAction $action): array
    {
        $comments = $action->run($request);

        return $this->transform($comments, CommentTransformer::class);
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function update(UpdateCommentRequest $request, UpdateCommentAction $action): array
    {
        $comment = $action->run($request);

        return $this->transform($comment, CommentTransformer::class);
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function delete(DeleteCommentRequest $request, DeleteCommentAction $action): JsonResponse
    {
        $action->run($request);

        return $this->noContent();
    }
}
