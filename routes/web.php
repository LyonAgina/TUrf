<?php
Route::delete('/bookings/{booking}/delete', [App\Http\Controllers\BookingController::class, 'delete'])->name('bookings.delete');
Route::delete('/bookings/{booking}/turf-delete', [App\Http\Controllers\BookingController::class, 'turfDelete'])->name('bookings.turfDelete');

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TurfController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/turfs', [TurfController::class, 'index'])->name('turfs');
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::delete('/turfs/{turf}', [App\Http\Controllers\TurfController::class, 'destroy'])->name('turfs.destroy');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

require __DIR__.'/auth.php';
