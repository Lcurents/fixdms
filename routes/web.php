<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('welcome');
});

Route::get('/',[LoginController::class,'index'])->name('home');
// Untuk login
Route::post('/',[LoginController::class,'login'])->name('login');

// halaman dashboard
Route::get('/home',[DashboardController::class,'index'])->name('home')->middleware('auth');

// halaman admin
Route::get('/user',[UserController::class,'user'])->name('user')->middleware('auth');

// tambah user
route::post('/user',[UserController::class,'store'])->name('user.post');

// update user
route::put('/users/{id}',[UserController::class,'update'])->name('user.update');

// delete user
route::delete('/user/{id}',[UserController::class,'destroy'])->name('user.delete');

Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
