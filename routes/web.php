<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TurfController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

// Home - Default route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Remove dashboard route (no redirect)
# Route::redirect('/dashboard', '/', 301)->middleware(['auth', 'verified']); // <-- removed

// Public routes
Route::get('/turfs', [TurfController::class, 'index'])->name('turfs');
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Booking Routes restricted by 'auth' middleware
Route::middleware('auth')->group(function () {
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::delete('/bookings/{booking}/delete', [BookingController::class, 'delete'])->name('bookings.delete');
    Route::delete('/bookings/{booking}/turf-delete', [BookingController::class, 'turfDelete'])->name('bookings.turfDelete');
    Route::delete('/turfs/{turf}', [TurfController::class, 'destroy'])->name('turfs.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin panel route for login redirect
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.panel');
});

// Admin resource routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::resource('turfs', App\Http\Controllers\Admin\TurfController::class);
    Route::resource('bookings', App\Http\Controllers\Admin\BookingController::class);
    Route::resource('locations', App\Http\Controllers\Admin\LocationController::class);
    Route::resource('payments', App\Http\Controllers\Admin\PaymentController::class);
});

require __DIR__.'/auth.php';