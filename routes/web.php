<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\project;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [AuthController::class,'login_index'])->name('login');
Route::post('/login', [AuthController::class,'login'])->name('login_submit');

Route::get('/register', [AuthController::class,'register_index'])->name('register');
Route::post('/register', [AuthController::class,'register']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [AuthController::class,'dashboard'])->name('dashboard');
    Route::get('/profile', [AuthController::class,'profile'])->name('profile');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
    Route::get('/role', [RoleController::class,'index'])->name('role');
    Route::post('/role', [RoleController::class,'create'])->name('add_role');

    //Create User
    Route::get('/user', [UserController::class,'create'])->name('user');
    Route::post('/user', [UserController::class,'store'])->name('add_user');

    //Edit User
    Route::get('/edit_user/{id}', [UserController::class,'edit'])->name('edit_user');
    Route::post('/edit_user', [UserController::class,'update'])->name('edit_user_submit');
    Route::get('/user_list', [UserController::class,'index'])->name('user_list');
    Route::post('/delete_user', [UserController::class,'destroy'])->name('delete_user');

    //Project
    Route::get('project',[ProjectController::class,'create'])->name('project');
    Route::post('project',[ProjectController::class,'store'])->name('add_project');
    Route::get('project_list',[ProjectController::class,'index'])->name('project_list');

    //Task
    Route::get('task',[taskController::class,'index'])->name('add_task');
    Route::post('task',[taskController::class,'store'])->name('submit_task');
    //Move task
    Route::post('update_task',[taskController::class,'update'])->name('update_task');
    //Add comment
    Route::post('add_comment',[taskController::class,'comment'])->name('add_comment');
    Route::post('send_req',[taskController::class,'send_req'])->name('send_req');
    Route::get('board/{id}',[taskController::class,'show'])->name('board');
    Route::get('req_list',[taskController::class,'req_list'])->name('req_list');
    Route::post('delete_req',[taskController::class,'delete_req'])->name('delete_req');
    Route::post('accept_req',[taskController::class,'accept_req'])->name('accept_req');
    Route::get('edit_task/{id}',[taskController::class,'edit'])->name('edit_task');
    Route::post('edit_task',[taskController::class,'edit_submit'])->name('edit_task_submit');
    Route::post('delete_task',[taskController::class,'delete_task'])->name('delete_task');

    //Log list
    Route::get('log_list',[taskController::class,'log_list'])->name('log_list');


});

Route::get('/forgot-password', [AuthController::class,'forgot_password_index'])->name('forgot-password');
