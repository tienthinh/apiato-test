<?php

namespace App\Containers\AppSection\Comment\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Containers\AppSection\Post\Models\Post;
// use App\Containers\AppSection\Like\Models\Like;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends ParentModel
{
    use SoftDeletes;

    protected $resourceKey = 'Comment';

    protected $fillable = [
        'content',
        'user_id',
        'post_id',
    ];

    protected $attributes = [];

    protected $hidden = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $with = [];

    protected $appends = [];

    protected static function booted(): void
    {
        if (app()->runningInConsole()) return;
        
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
