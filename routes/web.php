<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/preview', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about-us', [HomeController::class, 'about'])->name('about');

/**
 * Auth Routes
 */

Route::middleware('guest')->group(function() {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');


/**
 * User specific
 */
Route::middleware('auth')->group(function() {
    Route::get('dashboard', [UsersController::class, 'dashboard'])->name('users.dashboard');
    Route::get('app/create', [AppController::class, 'create'])->name('app.create');
    Route::post('app/store', [AppController::class, 'store'])->name('app.store');
});

/**
 * The App
 */

Route::prefix('app')->group(function() {
    Route::get('', [AppController::class, 'index'])->name('index');
});

Route::any('stripe', function(Request $request) {
    file_put_contents(now()->format('Y_m_d_His_u')."_stripe_$request->id _ $request->type .json", json_encode($request->all()));
    response()->json(['success' => 'success'], 200);
});
