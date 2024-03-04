<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookRequestController;
use App\Http\Controllers\CarController;


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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/bookRequest', [BookRequestController::class, 'store'])->name('bookRequest.store');
Route::get('/bookRequest', [BookRequestController::class, 'index'])->name('bookRequest.index');


    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
    
    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/cars/create', [CarController::class, 'store'])->name('cars.store');

    Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');
    
    Route::get('/cars/edit/{car}', [CarController::class, 'edit'])->name('cars.edit');
    Route::post('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
    Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

