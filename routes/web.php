<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmitTextController;



Route::get('/', [SubmitTextController::class, 'index']);

Route::get('/newsletter', function () {
    return view('newsletter', [SubmitTextController::class, 'renderForm']);
});

Route::post('/submitText', [SubmitTextController::class, 'submitText'])->name('submitText');