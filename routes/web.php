<?php

use App\Http\Controllers\Inertia\ChatController;
use App\Http\Controllers\Inertia\LoginController;
use App\Http\Controllers\ReactionController;
use Illuminate\Support\Facades\Route;

Route::controller(ReactionController::class)->group(function () {
    Route::get('/', 'index')->name('reaction.index');
    Route::post('/reaction', 'reaction')->name('reaction.action');
});

Route::controller(LoginController::class)
    ->middleware('guest')
    ->prefix('login')
    ->as('login.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'submit')->name('submit');
        Route::post('/logout', 'logout')->name('logout')
            ->withoutMiddleware('guest');
    });

Route::controller(ChatController::class)
    ->middleware('auth')
    ->prefix('chats')
    ->as('chats.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{chat}', 'show')->name('show');
        Route::post('/{chat}/message', 'message')->name('message');
    });
