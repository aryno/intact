<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/preview', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

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
