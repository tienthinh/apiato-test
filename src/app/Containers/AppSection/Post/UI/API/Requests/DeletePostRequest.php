<?php

namespace App\Containers\AppSection\Post\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;
use App\Containers\AppSection\Post\Models\Post;

class DeletePostRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        'id',
    ];

    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            // 'id' => 'required',
        ];
    }

    public function authorize(): bool
    {
        // Check if the user owns the post
        $post = $this->route('id') ? Post::find($this->route('id')) : null;

        $hasAccess = $this->check([
            'hasAccess',
        ]);

        return $hasAccess && $post && $post->user_id === $this->user()->id;
    }
}
