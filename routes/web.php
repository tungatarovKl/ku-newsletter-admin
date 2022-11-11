<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/newsletter', function () {
    return view('newsletter', ['name' => 'World']);
});
