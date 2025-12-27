<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $guarded = [];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function getRegistrationStatusAttribute(): string
    {
        if ($this->status !== 'PUBLISHED') {
            return 'CLOSED';
        }

        if ($this->registration_open_at && now()->lt($this->registration_open_at)) {
            return 'COMING_SOON';
        }

        if ($this->registration_close_at && now()->gt($this->registration_close_at)) {
            return 'CLOSED';
        }

        return 'OPEN';
    }

    public function getLifecycleStatusAttribute(): string
    {
        if ($this->status === 'CANCELLED') {
            return 'CANCELLED';
        }

        if (now()->lt($this->start_at)) {
            return 'UPCOMING';
        }

        if (now()->between($this->start_at, $this->end_at)) {
            return 'ONGOING';
        }

        return 'FINISHED';
    }

    public function isRegistrationOpen(): bool
    {
        return $this->registration_status === 'OPEN';
    }

    public function hasStarted(): bool
    {
        return now()->gte($this->start_at);
    }

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
