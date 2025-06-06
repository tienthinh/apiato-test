<?php

namespace App\Containers\AppSection\Post\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Containers\AppSection\Comment\Models\Comment;
// use App\Containers\AppSection\Like\Models\Like;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends ParentModel
{
    use SoftDeletes;

    protected $resourceKey = 'Post';

    protected $fillable = [
        'title',
        'content',
        'user_id',
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

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // public function likes(): HasMany
    // {
    //     return $this->hasMany(Like::class);
    // }

    // public function isLikedByUser($userId): bool
    // {
    //     return $this->likes()->where('user_id', $userId)->exists();
    // }
}
