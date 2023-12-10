<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('/login', [AuthController::class,'login_index'])->name('login');
Route::post('/login', [AuthController::class,'login']);

Route::get('/register', [AuthController::class,'register_index'])->name('register');
Route::post('/register', [AuthController::class,'register']);

Route::get('/dashboard', [AuthController::class,'dashboard'])->name('dashboard')->middleware('checklogin');
Route::get('/profile', [AuthController::class,'profile'])->name('profile')->middleware('checklogin');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class,'forgot_password_index'])->name('forgot-password');
