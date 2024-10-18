<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;

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

Route::middleware(['isNotLogin'])->group(function () {
    Route::get('/', [UserController::class, 'showLogin'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login.user');
});

Route::middleware(['isLogin'])->group(function (){

    Route::get('/home', [Controller::class, 'landing'])->name('home');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/profile', [Controller::class, 'profile'])->name('profile');

    Route::prefix('/cars')->name('cars.')->group(function() {
        Route::get('/', [CarController::class, 'index'])->name('index');
        Route::get('/create', [CarController::class, 'create'])->name('create');
        Route::post('/add', [CarController::class, 'store'])->name('store');

        Route::delete('/delete/{id}', [CarController::class, 'destroy'])->name('delete');
        Route::get('/edit/{id}', [CarController::class, 'edit'])->name('edit');
        Route::patch('/edit/{id}', [CarController::class, 'update'])->name('update');
    });

    Route::prefix('/users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/add', [UserController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/edit/{id}', [UserController::class, 'update'])->name('update');

        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    });
});