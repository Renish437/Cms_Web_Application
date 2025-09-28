<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //
    public function parent():BelongsTo{
        return $this->belongsTo(self::class);
    }
    public function children():HasMany{
        return $this->hasMany(self::class);
    }

}
