<?php

namespace App\Http\Controllers;

use App\Events\ReactedEvent;

class ReactionController extends Controller
{
    public function index()
    {
        return view('pages.reaction.index');
    }

    public function reaction()
    {
        event(
            new ReactedEvent(
                buttonId: request()->input('buttonId'),
                emoji: request()->input('emoji'),
            )
        );
    }
}
