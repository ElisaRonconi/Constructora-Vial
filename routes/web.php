<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ReportController; 


Route::get('/', function () {
    return redirect()->route('login');
});


require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/mantenimiento', [MaintenanceController::class, 'index'])->name('maintenance.index');
    

    Route::get('/dashboard', function () {   return view('dashboard'); })->name('dashboard');

    Route::resource('machines', MachineController::class);

    Route::resource('works', WorkController::class);
   
    Route::resource('assignments', AssignmentController::class);
   
    Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking.index');
    
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
