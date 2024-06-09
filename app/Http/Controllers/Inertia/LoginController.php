<?php

namespace App\Http\Controllers\Inertia;

use App\Data\User\LoginData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index()
    {
        return Inertia::render('Login/Index');
    }

    public function submit(LoginData $data)
    {
        if (! Auth::attempt($data->toArray())) {
            return back()->withErrors([
                'password' => 'Неверный логин или пароль',
            ]);
        }

        return redirect()->route('chats.index');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login.index');
    }
}
