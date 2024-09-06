<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mark-as-read', [AuthController::class,'markAsRead'])->name('mark-as-read');