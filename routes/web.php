<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/market', [HomeController::class, 'market'])->name('market');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/api/market', [HomeController::class, 'liveMarketJson'])->name('api.market');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.submit');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.submit');
Route::get('/auth/google', [AuthController::class, 'googleAuth'])->name('auth.google');
Route::get('/auth/google/register', [AuthController::class, 'googleRegister'])->name('auth.google.register');
Route::get('/auth/phone', [AuthController::class, 'phoneAuth'])->name('auth.phone');
Route::get('/auth/phone/register', [AuthController::class, 'phoneRegister'])->name('auth.phone.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/users/{user}/toggle-status', [\App\Http\Controllers\AdminController::class, 'toggleUserStatus'])->name('admin.users.toggle-status');
});

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
