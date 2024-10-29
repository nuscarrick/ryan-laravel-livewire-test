<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\BasicAuthentication;

Route::get('/', function () {
    return view('dashboard');
})->middleware([BasicAuthentication::class]);
