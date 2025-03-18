<?php

use App\Http\Controllers\CsokiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("csokis", CsokiController::class);