<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VotesController;
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
    Route::get('apps/create', [AppController::class, 'create'])->name('app.create');
    Route::post('apps/store', [AppController::class, 'store'])->name('app.store');
    Route::get('apps/list', [AppController::class, 'list'])->name('app.list');
    Route::get('script/{code}', [AppController::class, 'script'])->name('app.script');
    Route::post('createFeature', [FeatureController ::class, 'createFeature'])->name('feature.createFeature'); // to create feature
    Route::get('featuresList/{id?}',  [FeatureController::class, 'geAllFeatures'])->name('list');
    Route::get('feature/{id}', [FeatureController::class, 'createFeatureForm'])->name('feature'); // show feature form for add feature
    Route::get('features/{id?}/edit', [FeatureController::class, 'getFeatures'])->name('getFeatures'); //edit  feature from feature
    Route::put('updateFeature/{id}', [FeatureController::class, 'updateFeature'])->name('feature.updateFeature');
    Route::get('deleteFeature/{id}', [FeatureController::class, 'deleteFeature'])->name('deleteFeature');
    
    Route::post('/votes', [VotesController::class, 'storeVote'])->name('votes.store');

    Route::get('survey/list/{id}', [SurveyController::class, 'list'])->name('survey.list');
    Route::get('survey/{id}', [SurveyController::class, 'create'])->name('survey.create');
    Route::post('survey', [SurveyController::class, 'save'])->name('survey.save');
    Route::get('survey/responses/{id}', [SurveyController::class, 'showResponses'])->name('survey.showResponses');
    Route::post('survey/responses', [SurveyController::class, 'saveResponses'])->name('survey.saveResponses');
});

Route::get('script/{code}.js', [AppController::class, 'script'])->name('app.script');

/**
 * The App
 */
Route::prefix('script/{code}.js/app')->group(function() {
    Route::get('', [AppController::class, 'show'])->name('app.show');
});


Route::any('stripe', function(Request $request) {
    file_put_contents(now()->format('Y_m_d_His_u')."_stripe_$request->id _ $request->type .json", json_encode($request->all()));
    response()->json(['success' => 'success'], 200);
});
