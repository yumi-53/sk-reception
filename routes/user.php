<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::resource('user', UserController::class)->only(['index', 'edit', 'update','destroy'])->middleware(['auth', 'verified']);
