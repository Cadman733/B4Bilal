<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// --- Public Routes ---
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('main'); // If already logged in, go to main page
    }
    return view('auth.login'); // If not logged in, just SHOW the login page (don't redirect)
});

// Guest only routes (Login/Register)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'handleLogin']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'handleRegister']);
});

// --- Authenticated Routes ---
Route::middleware('auth')->group(function () {
    
    // Main Selection Page
    Route::get('/main', function () {
        return view('main');
    })->name('main');

    // Marketplace (Buy)
    Route::get('/buy', [ProductController::class, 'index'])->name('products.index');

    // Selling (Create)
    Route::get('/sell', [ProductController::class, 'create'])->name('products.create');
    Route::post('/sell', [ProductController::class, 'store'])->name('products.store');

    // Management (My Listings)
    Route::get('/manage', [ProductController::class, 'manage'])->name('products.manage');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});