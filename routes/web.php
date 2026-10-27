<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SachController;

Route::resource('saches', SachController::class)->names('saches');

Route::get('/', function () {
    return redirect()->route('saches.index');
});
