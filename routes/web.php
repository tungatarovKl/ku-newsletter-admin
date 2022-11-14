<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmitTextController;

Route::get('/newsletter', function () {
    return view('newsletter', [SubmitTextController::class, 'renderForm']);
});

Route::post('/submitText', [SubmitTextController::class, 'submitText'])->name('submitText');