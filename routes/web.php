<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestCrudController;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/test-crud', [TestCrudController::class, 'index'])->name('testCrud.index');
Route::post('/test-crud', [TestCrudController::class, 'store'])->name('testCrud.store');
Route::delete('/test-crud/{id}', [TestCrudController::class, 'delete'])->name('testCrud.delete');
Route::put('/test-crud/{id}', [TestCrudController::class, 'update'])->name('testCrud.update');

Route::get('/register', [HomeController::class, 'register'])->name('register.index');
Route::post('/register', [HomeController::class, 'registerPost'])->name('register.post');

Route::get('/login', [HomeController::class, 'login'])->name('login.index');
Route::post('/login', [HomeController::class, 'loginPost'])->name('login.post');

Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
