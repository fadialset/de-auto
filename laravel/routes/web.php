<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
Route::get('/', function () {
    return Auth::check() ? redirect('/dashboard') : redirect('/login');
});

Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return app(AdminController::class)->dashboard();
    }
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


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');



require __DIR__.'/auth.php';
