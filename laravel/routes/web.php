<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');    

Route::get('/car/image/{id}', [CarController::class, 'getImage'])->name('car.image');
Route::resource('public-cars', App\Http\Controllers\PublicCarController::class);
use App\Http\Controllers\PublicCarController;

// Public cars route
Route::resource('public-cars', PublicCarController::class);
Route::post('/public-cars/{id}/add-to-my-cars', [PublicCarController::class, 'addToMyCars'])
    ->name('public-cars.add-to-my-cars')
    ->middleware('auth');




Route::middleware(['auth'])->group(function () {
    Route::resource('cars', 'App\Http\Controllers\CarController');

}); 
Route::middleware('auth')->group(function () {
        
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
