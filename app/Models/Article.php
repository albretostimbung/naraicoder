<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function setNameAttribute($value)
    {
        $this->attributes['user_id'] = auth()->id();
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str()->slug($value);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
