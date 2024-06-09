<?php

namespace App\Data\Chat;

use App\Data\User\UserData;
use App\Models\Message;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class MessageData extends Data
{
    public function __construct(
        public int $id,
        public ?string $message,
        public ?string $createdAt,
        public UserData $user,
        public bool $isOwn,
    ) {
    }

    public static function fromModel(Message $message): static
    {
        return new static(
            id: $message->id,
            message: $message->message,
            createdAt: Carbon::parse($message->created_at)->format('H:i'),
            user: UserData::from($message->sender),
            isOwn: $message->sender_id === auth()->id(),
        );
    }
}
