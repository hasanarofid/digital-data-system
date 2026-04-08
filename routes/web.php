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
 
use App\Http\Controllers\DigitalDataController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/', function () {
    $programs = \App\Models\Program::all();
    return view('welcome', compact('programs'));
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('member.dashboard');
    })->name('dashboard');

    // Operator Dashboard
    Route::get('/member/dashboard', [MemberDashboardController::class, 'index'])
        ->middleware(['role:member'])
        ->name('member.dashboard');

    // Admin Routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/data', [AdminDashboardController::class, 'list'])->name('admin.list');
        Route::patch('/admin/data/{digitalDatum}/status', [AdminDashboardController::class, 'updateStatus'])->name('admin.data.update-status');
        Route::get('/admin/report', [AdminDashboardController::class, 'report'])->name('admin.report');
        
        // Informative Pages
        Route::get('/admin/info/database', [AdminDashboardController::class, 'databaseInfo'])->name('admin.info.database');
        Route::get('/admin/info/tracking', [AdminDashboardController::class, 'trackingInfo'])->name('admin.info.tracking');
    });

    // Field Operator Routes
    Route::middleware(['role:member'])->group(function () {
        Route::resource('digital-data', DigitalDataController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
 require __DIR__.'/auth.php';
