<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::get('/login', [LoginController::class, 'loginGET'])
    ->name('login');

Route::post('/login/post', [LoginController::class, 'loginPOST'])
    ->name('loginPOST');

Route::get('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/users', [UserController::class, 'usersGet']);

Route::get('/users/create', [UserController::class, 'createUserGET'])
    ->name('createUserGET');

Route::post('/users/create/post', [UserController::class, 'createUserPOST'])
    ->name('createUserPOST');

Route::get('/newsletter', [MessageController::class, 'newsletterGET']);

Route::post('/sendMessage', [MessageController::class, 'sendMessage'])
    ->name('sendMessage');

Route::get('/history', [MessageController::class, 'history']);