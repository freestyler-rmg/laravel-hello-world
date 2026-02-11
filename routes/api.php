<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestCrudApiController;

Route::get('/test-crud', [TestCrudApiController::class, 'index'])->name('api.testCrud.index');
Route::post('/test-crud', [TestCrudApiController::class, 'store'])->name('api.testCrud.store');
Route::delete('/test-crud/{id}', [TestCrudApiController::class, 'delete'])->name('api.testCrud.delete');
Route::put('/test-crud/{id}', [TestCrudApiController::class, 'update'])->name('api.testCrud.update');
Route::get('/test-crud/search', [TestCrudApiController::class, 'search'])->name('api.testCrud.search');
