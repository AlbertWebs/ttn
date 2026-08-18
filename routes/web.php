<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('/send-message', [HomeController::class, 'send'])->name('send-message');
Route::get('/privacy-policy', [HomeController::class, 'page'])->defaults('slug', 'privacy-policy');
Route::get('/terms-and-conditions', [HomeController::class, 'page'])->defaults('slug', 'terms-and-conditions');
Route::get('/cookie-policy', [HomeController::class, 'page'])->defaults('slug', 'cookie-policy');
Route::get('/page/{slug}', [HomeController::class, 'page'])->name('page.show');

Route::prefix('admin-dashboard')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'show'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.store');

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('settings/{group}', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings/{group}', [SettingController::class, 'update'])->name('settings.update');
        Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
        Route::get('inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
        Route::delete('inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');
        Route::get('{resource}', [ResourceController::class, 'index'])->name('resources.index');
        Route::get('{resource}/create', [ResourceController::class, 'create'])->name('resources.create');
        Route::post('{resource}', [ResourceController::class, 'store'])->name('resources.store');
        Route::get('{resource}/{id}/edit', [ResourceController::class, 'edit'])->name('resources.edit');
        Route::put('{resource}/{id}', [ResourceController::class, 'update'])->name('resources.update');
        Route::delete('{resource}/{id}', [ResourceController::class, 'destroy'])->name('resources.destroy');
    });
});
