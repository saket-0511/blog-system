<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;

// ─── Public Routes ───────────────────────────────────────────
Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blogs.show');

// ─── Admin Routes ─────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {

    // Auth
    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

    // Protected
    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminBlogController::class, 'dashboard'])->name('dashboard');
        Route::resource('/blogs', AdminBlogController::class);
    });
});
