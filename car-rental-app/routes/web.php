<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookRequestController;
use App\Http\Controllers\CarController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link resent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/bookRequest', [BookRequestController::class, 'store'])->name('bookRequest.store');
Route::get('/bookRequest', [BookRequestController::class, 'index'])->name('bookRequest.index');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::middleware(['can:isAdmin'])->group(function(){
        Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
        Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
        Route::get('/cars/edit/{car}', [CarController::class, 'edit'])->name('cars.edit');
        Route::get('/cars/show/{car}', [CarController::class, 'show'])->name('cars.show');
        Route::post('/cars/create', [CarController::class, 'store'])->name('cars.store');
        Route::post('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
        Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.delete');
    });
});