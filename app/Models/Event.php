<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $guarded = [];

    protected $casts = [
        'start_at' => 'datetime',
    ];

    public function onlineDetail()
    {
        return $this->hasOne(EventOnlineDetail::class);
    }

    public function offlineDetail()
    {
        return $this->hasOne(EventOfflineDetail::class);
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
