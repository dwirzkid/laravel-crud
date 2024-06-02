<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
use App\Http\Controllers\StaffController;
use App\Models\Staff;

Route::get('/', function () { 
    $staffs = Staff::all(); 
    return view('welcome', ['staffs' => $staffs]); 
    })->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post(
    '/staff',
    [StaffController::class, 'create']
)->name('staff.create');

Route::delete(
    '/staff/{id}',
    [StaffController::class, 'delete']
)->name('staff.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
