<?php

use App\Http\Controllers\FeluxvideoController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Pest\Plugins\Only;

// Route::get('/', [FeluxvideoController::class], 'index');
Route::get('/', [FeluxvideoController::class, 'index']);

Route::get('/upload', function() {
    return view('/upload');
})->middleware(['auth', 'verified'])->name('upload');

Route::get('/home', function() {
    return view('/home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::resource('feluxvideos', FeluxvideoController::class) 
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth']); 
    // kan lägga till email verificiton med verified här
require __DIR__.'/auth.php';

