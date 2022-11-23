<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\UserController;

Route::get('/login', [LoginController::class, 'loginGET'])
    ->name('login');

Route::post('/login/post', [LoginController::class, 'loginPOST'])
    ->name('loginPOST');

Route::get('/users', [UserController::class, 'usersGet']);

Route::get('/users/create', [UserController::class, 'createUserGET'])
    ->name('createUserGET');

Route::post('/users/create/post', [UserController::class, 'createUserPOST'])
    ->name('createUserPOST');

Route::get('/newsletter', [SendMessageController::class, 'renderForm']);

Route::post('/sendMessage', [SendMessageController::class, 'sendMessage'])
    ->name('sendMessage');