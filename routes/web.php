<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataEntryController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function(){
Route::get('/',[LoginController::class,'index'])->name('home');
// Untuk login
Route::post('/',[LoginController::class,'login'])->name('login');
});

Route::middleware(['auth'])->group(function(){
// halaman dashboard
Route::get('/home',[DashboardController::class,'index'])->name('home')->middleware('auth');

// halaman admin
Route::get('/user',[UserController::class,'user'])->name('user')->middleware('role:admin');

// tambah user
route::post('/user',[UserController::class,'store'])->name('user.post')->middleware('role:admin');

// update user
route::put('/users/{id}',[UserController::class,'update'])->name('user.update')->middleware('role:admin');

// delete user
route::delete('/user/{id}',[UserController::class,'destroy'])->name('user.delete')->middleware('role:admin');

// tombol logout
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/dataentry',[DataEntryController::class,'index'])->name('data')->middleware('auth');

Route::get('/kpi',[KpiController::class,'index'])->name('data')->middleware('auth');

Route::get('/kategori',[KategoriController::class,'index'])->name('data')->middleware('auth');
});