<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/campaign', [HomeController::class, 'store'])->name('campaign.store');
Route::get('/campaign/{id}/edit', [HomeController::class, 'edit'])->name('campaign.edit');
Route::put('/campaign/{id}', [HomeController::class, 'update'])->name('campaign.update');
Route::delete('/campaign/{id}', [HomeController::class, 'destroy'])->name('campaign.destroy');