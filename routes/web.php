<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Auth\GoogleController;


Route::get('/', function () {
    return view('pages.auth.login');
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/requests/{requestId}/status/{status}', [ProductController::class, 'updateRequestStatus'])->name('requests.updateStatus');
Route::get('/user/profile/{userId}', [ProfileController::class, 'showProfile'])->name('user.profile');
Route::get('/users/{userId}', [ProfileController::class, 'index'])->name('users.index');


Route::get('/requestdetails', function () {
    return view('pages.requestdetails');
})->middleware(['auth', 'verified'])->name('requestdetails');

Route::get('/requestproduct', function () {
    return view('pages.requestproduct');
})->middleware(['auth', 'verified'])->name('requestproduct');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::post('/products/request-inventory', [ProductController::class, 'requestInventory'])->name('products.requestInventory');

require __DIR__.'/auth.php';
