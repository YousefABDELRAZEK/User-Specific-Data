<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TitleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Title routes
    Route::get('/titles', [TitleController::class, 'index'])->name('titles.index'); // Show titles
    Route::post('/titles', [TitleController::class, 'create'])->name('titles.store'); // Create title
});

// Include Laravel Breeze authentication routes
require __DIR__.'/auth.php';
