<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestCrudApiController;
use App\Http\Controllers\CredentialApiController;

Route::get('/test-crud', [TestCrudApiController::class, 'index'])->name('api.testCrud.index');
Route::post('/test-crud', [TestCrudApiController::class, 'store'])->name('api.testCrud.store');
Route::delete('/test-crud/{id}', [TestCrudApiController::class, 'delete'])->name('api.testCrud.delete');
Route::put('/test-crud/{id}', [TestCrudApiController::class, 'update'])->name('api.testCrud.update');
Route::get('/test-crud/search', [TestCrudApiController::class, 'search'])->name('api.testCrud.search');

Route::post('/login', [CredentialApiController::class], 'login')->name('api.login');
Route::post('/register', [CredentialApiController::class], 'register')->name('api.register');
Route::post('/logout', [CredentialApiController::class], 'logout')->name('api.logout');
Route::post('/check-status', [CredentialApiController::class], 'checkStatus')->name('api.check-status');
