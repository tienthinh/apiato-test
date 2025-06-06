<?php

namespace App\Containers\AppSection\Post\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Post\Actions\CreatePostAction;
use App\Containers\AppSection\Post\Actions\DeletePostAction;
use App\Containers\AppSection\Post\Actions\FindPostByIdAction;
use App\Containers\AppSection\Post\Actions\ListPostsAction;
use App\Containers\AppSection\Post\Actions\UpdatePostAction;
use App\Containers\AppSection\Post\UI\API\Requests\CreatePostRequest;
use App\Containers\AppSection\Post\UI\API\Requests\DeletePostRequest;
use App\Containers\AppSection\Post\UI\API\Requests\FindPostByIdRequest;
use App\Containers\AppSection\Post\UI\API\Requests\ListPostsRequest;
use App\Containers\AppSection\Post\UI\API\Requests\UpdatePostRequest;
use App\Containers\AppSection\Post\UI\API\Transformers\PostTransformer;
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
    public function create(CreatePostRequest $request, CreatePostAction $action): JsonResponse
    {
        $post = $action->run($request);

        return $this->created($this->transform($post, PostTransformer::class));
    }

    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findById(FindPostByIdRequest $request, FindPostByIdAction $action): array
    {
        $post = $action->run($request);

        return $this->transform($post, PostTransformer::class);
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function list(ListPostsRequest $request, ListPostsAction $action): array
    {
        $posts = $action->run($request);

        return $this->transform($posts, PostTransformer::class);
    }

    /**
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function update(UpdatePostRequest $request, UpdatePostAction $action): array
    {
        $post = $action->run($request);

        return $this->transform($post, PostTransformer::class);
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function delete(DeletePostRequest $request, DeletePostAction $action): JsonResponse
    {
        $action->run($request);

        return $this->noContent();
    }
}
