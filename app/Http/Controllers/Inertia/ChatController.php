<?php

namespace App\Http\Controllers\Inertia;

use App\Data\Chat\ChatData;
use App\Data\Chat\MessageData;
use App\Data\Chat\SendMessageData;
use App\Data\User\UserData;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use Inertia\Inertia;

class ChatController extends Controller
{
    public function index()
    {
        return Inertia::render('Chat/Index', [
            'chats' => ChatData::collect(auth()->user()->chats()),
        ]);
    }

    public function show(Chat $chat)
    {
        return Inertia::render('Chat/Show', [
            'chatId' => $chat->id,
            'companion' => UserData::from($chat->user()),
            'messages' => MessageData::collect($chat->messages),
        ]);
    }

    public function message(Chat $chat, SendMessageData $data)
    {
        $chat->messages()->create([
            'sender_id' => auth()->id(),
            'message' => $data->message,
        ]);

        return redirect()->route('chats.show', $chat);
    }
}
