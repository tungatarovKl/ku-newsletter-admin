<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendMessageController;

Route::get('/newsletter', function () {
    return view('newsletter', [SendMessageController::class, 'renderForm']);
});

Route::post('/sendMessage', [SendMessageController::class, 'sendMessage'])->name('sendMessage');