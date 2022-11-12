<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return redirect('/newsletter');
});

Route::get('/newsletter', function () {
    return view('newsletter', ['name' => 'World']);
});

//test db connection
Route::get('/testmysql', function () {
    echo var_dump(DB::select('SELECT VERSION();'));
});
