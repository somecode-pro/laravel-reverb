<?php

use App\Http\Controllers\ReactionController;
use Illuminate\Support\Facades\Route;

Route::controller(ReactionController::class)->group(function () {
    Route::get('/', 'index')->name('reaction.index');
    Route::post('/reaction', 'reaction')->name('reaction.action');
});
