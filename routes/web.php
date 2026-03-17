<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\GymClassController;
use App\Http\Controllers\CheckInController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberDashboardController;
 
 Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('home');
 
 Route::middleware(['auth', 'verified'])->group(function () {
     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
     
    Route::middleware(['role:member'])->prefix('member')->name('member.')->group(function () {
        Route::get('/dashboard', [MemberDashboardController::class, 'index'])->name('dashboard');
        Route::get('/bookings', [App\Http\Controllers\BookingController::class, 'index'])->name('bookings.index');
        Route::post('/bookings', [App\Http\Controllers\BookingController::class, 'store'])->name('bookings.store');
    });
 
     Route::resource('packages', PackageController::class);
     Route::resource('members', MemberController::class);
     Route::resource('trainers', TrainerController::class);
     Route::resource('gym-classes', GymClassController::class);
     Route::resource('check-ins', CheckInController::class);
 
     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 });
 
 require __DIR__.'/auth.php';
