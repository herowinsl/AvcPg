<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvancementController;


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', [AvancementController::class, 'accueil'])->name('accueil');
    Route::get('/avancement', [AvancementController::class, 'index'])->name('avancement.index');
    Route::post('/import', [AvancementController::class, 'import'])->name('avancement.import');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
