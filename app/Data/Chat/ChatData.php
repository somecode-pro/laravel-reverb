<?php

namespace App\Data\Chat;

use App\Data\User\UserData;
use App\Models\Chat;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class ChatData extends Data
{
    public function __construct(
        public int $id,
        public int $totalMessages,
        public UserData $user,
    ) {
    }

    public static function fromModel(Chat $chat): static
    {
        return new static(
            id: $chat->id,
            totalMessages: $chat->messages()->count(),
            user: UserData::from($chat->user()),
        );
    }
}
