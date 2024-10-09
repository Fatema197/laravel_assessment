<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Protect these routes with auth middleware
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // User routes
    Route::post('/users', [UserController::class, 'store']);                  // Create
    Route::get('/users/{id}', [UserController::class, 'show']);               // Read single
    Route::get('/users', [UserController::class, 'index']);                   // Read all
    Route::post('/users/update', [UserController::class, 'update']);          // Update
    Route::post('/users/delete', [UserController::class, 'destroy']);         // Delete
    
    // Project routes
    Route::post('/projects', [ProjectController::class, 'store']);            // Create
    Route::get('/projects/{id}', [ProjectController::class, 'show']);         // Read single
    Route::get('/projects', [ProjectController::class, 'index']);             // Read all
    Route::post('/projects/update', [ProjectController::class, 'update']);    // Update
    Route::post('/projects/delete', [ProjectController::class, 'destroy']);   // Delete
    
    // Timesheet routes
    Route::post('/timesheets', [TimesheetController::class, 'store']);        // Create
    Route::get('/timesheets/{id}', [TimesheetController::class, 'show']);     // Read single
    Route::get('/timesheets', [TimesheetController::class, 'index']);         // Read all
    Route::post('/timesheets/update', [TimesheetController::class, 'update']);// Update
    Route::post('/timesheets/delete', [TimesheetController::class, 'destroy']);// Delete
});

