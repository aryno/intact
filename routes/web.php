<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::any('stripe', function(Request $request) {
    file_put_contents(now()->format('Y_m_d_His_u')."_stripe_$request->id _ $request->type .json", json_encode($request->all()));
    response()->json(['success' => 'success'], 200);
});
