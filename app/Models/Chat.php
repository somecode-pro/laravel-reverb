<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'initiator_id',
        'recipient_id',
    ];

    public function initiator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'initiator_id');
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function user()
    {
        return $this->initiator_id === auth()->id()
            ? $this->recipient
            : $this->initiator;
    }

    public function hasAccess(int $userId): bool
    {
        return $this->initiator_id === $userId || $this->recipient_id === $userId;
    }
}
