<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\ReceptionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\ReceptionsQrcd;

use function Termwind\render;

// 管理者ゲストのみ
Route::middleware('guest:admin')->group(function () {
    Route::get('admin/login', [Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('admin.login');
    Route::post('admin/login', [Admin\Auth\AuthenticatedSessionController::class, 'store']);
});


// 認証済みの管理者のみ
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::get('home', [UserController::class, 'index'])->name('users.index');
    Route::resource('users', UserController::class)->only(['edit', 'update', 'destroy']);

    Route::resource('reception', ReceptionController::class)->only(['index', 'create', 'store']);

    Route::post('logout', [Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
});