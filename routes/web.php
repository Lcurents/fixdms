<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataEntryController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlantController;
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
// Bagan KPI

// Create
Route::post('/kpi',[KpiController::class,'store'])->name('kpi.post')->middleware('auth');

// Read
Route::get('/kpi',[KpiController::class,'kpi'])->name('kpi')->middleware('auth');

// Update
Route::put('/kpi/{id}',[KpiController::class,'update'])->name('kpi.update')->middleware('auth');

// Delete
Route::delete('/kpi/{id}',[KpiController::class,'destroy'])->name('kpi.delete')->middleware('auth');

// Akhir Bagan KPI

// Bagan Kategori

// Create
Route::post('/kategori',[KategoriController::class,'store'])->name('kategori.post')->middleware('auth');

// Read
Route::get('/kategori',[KategoriController::class,'kategori'])->name('kategori')->middleware('auth');

// Update
Route::put('/kategori/{id}',[KategoriController::class,'update'])->name('kategori.update')->middleware('auth');

// Delete
Route::delete('/kategori/{id}',[KategoriController::class,'destroy'])->name('kategori.delete')->middleware('auth');

// Akhir bagan Kategori

// Bagan plant

// Create
Route::post('/plant',[PlantController::class,'store'])->name('plant.post')->middleware('auth');

// Read
Route::get('/plant',[PlantController::class,'plant'])->name('plant')->middleware('auth');

// Update
Route::put('/plant/{id}',[PlantController::class,'update'])->name('plant.update')->middleware('auth');

// Delete
Route::delete('/plant/{id}',[PlantController::class,'destroy'])->name('plant.delete')->middleware('auth');
});