<?php

namespace App\Models;

use App\enum\PostStatus;
use App\enum\PostType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    //
      protected $casts =[
        'status' => PostStatus::class,
        'type' => PostType::class
    ];

    public function parent() :BelongsTo
    {
        return $this->belongsTo(self::class);
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
