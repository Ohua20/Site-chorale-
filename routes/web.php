<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/formulaire', [InscriptionController::class, 'create'])->name('formulaire');
Route::get('/inscription', [InscriptionController::class, 'create'])
    ->name('inscription.create');
Route::post('/inscription', [InscriptionController::class, 'store'])
    ->name('inscription.store');