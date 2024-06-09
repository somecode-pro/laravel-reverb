<?php

namespace App\Broadcasting;

use App\Models\Chat;
use App\Models\User;

class ChatChannel
{
    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user, Chat $chat): array|bool
    {
        return $chat->hasAccess($user->id);
    }
}
