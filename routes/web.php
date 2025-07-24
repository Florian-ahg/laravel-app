<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('contrats', App\Http\Controllers\ContratController::class)
    // ->middleware(['auth', 'verified'])
    ->names('contrats');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
