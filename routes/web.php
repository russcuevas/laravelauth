<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

// ROUTINGS TO DIRECT THE USER IN LOGIN AND REGISTRATION VIEW
Route::get('login', [AuthController::class, 'login'])->middleware('AlreadyLoggedIn');
Route::get('register', [AuthController::class, 'register'])->middleware('AlreadyLoggedIn');
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('AuthCheck');
Route::get('logout', [AuthController::class, 'logout']);

Route::post('registeruser', [AuthController::class, 'registerUser'])->name('registeruser');
Route::post('loginuser', [AuthController::class, 'loginUser'])->name('loginuser');
