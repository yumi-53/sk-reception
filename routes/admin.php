<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\ReceptionController;
use App\Http\Controllers\Admin\UserController;

Route::middleware('guest:admin')->group(function () {
    Route::get('admin/login', [Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('admin.login');
    Route::post('admin/login', [Admin\Auth\AuthenticatedSessionController::class, 'store']);
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    
    Route::get('home', [Admin\HomeController::class, 'index'])->name('home');
    Route::post('reception', [UserController::class, 'store']);
    Route::post('reception/{user}', [ReceptionController::class, 'store']);

});

Route::middleware('auth:admin')->group(function () {
    Route::post('admin/logout', [Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});