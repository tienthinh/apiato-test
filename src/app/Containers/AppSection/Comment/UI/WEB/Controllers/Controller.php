<?php

namespace App\Containers\AppSection\Comment\UI\WEB\Controllers;

use App\Containers\AppSection\Comment\Actions\CreateCommentAction;
use App\Containers\AppSection\Comment\Actions\DeleteCommentAction;
use App\Containers\AppSection\Comment\Actions\FindCommentByIdAction;
use App\Containers\AppSection\Comment\Actions\ListCommentsAction;
use App\Containers\AppSection\Comment\Actions\UpdateCommentAction;
use App\Containers\AppSection\Comment\UI\WEB\Requests\CreateCommentRequest;
use App\Containers\AppSection\Comment\UI\WEB\Requests\DeleteCommentRequest;
use App\Containers\AppSection\Comment\UI\WEB\Requests\EditCommentRequest;
use App\Containers\AppSection\Comment\UI\WEB\Requests\FindCommentByIdRequest;
use App\Containers\AppSection\Comment\UI\WEB\Requests\ListCommentsRequest;
use App\Containers\AppSection\Comment\UI\WEB\Requests\StoreCommentRequest;
use App\Containers\AppSection\Comment\UI\WEB\Requests\UpdateCommentRequest;
use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index(ListCommentsRequest $request)
    {
        $comments = app(ListCommentsAction::class)->run($request);
        // ...
    }

    public function show(FindCommentByIdRequest $request)
    {
        $comment = app(FindCommentByIdAction::class)->run($request);
        // ...
    }

    public function create(CreateCommentRequest $request)
    {
    }

    public function store(StoreCommentRequest $request)
    {
        $comment = app(CreateCommentAction::class)->run($request);
        // ...
    }

    public function edit(EditCommentRequest $request)
    {
        $comment = app(FindCommentByIdAction::class)->run($request);
        // ...
    }

    public function update(UpdateCommentRequest $request)
    {
        $comment = app(UpdateCommentAction::class)->run($request);
        // ...
    }

    public function destroy(DeleteCommentRequest $request)
    {
        $result = app(DeleteCommentAction::class)->run($request);
        // ...
    }
}
