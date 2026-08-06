<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    // Redirect authenticated users to the dashboard.
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    // Redirect guests to the login page.
    return redirect()->route('login');

});

// Dashboard route
Route::get(
    '/dashboard',
    [App\Http\Controllers\DashboardController::class, 'index']
)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    // Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    //     ->middleware(['auth', 'verified'])
    //     ->name('dashboard');
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    /*
    |--------------------------------------------------------------------------
    | Departments
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'departments',
        App\Http\Controllers\DepartmentController::class
    );


    /*
    |--------------------------------------------------------------------------
    | Documents
    |--------------------------------------------------------------------------
    */

    Route::get(
        'documents/{document}/download',
        [App\Http\Controllers\DocumentController::class, 'download']
    )->name('documents.download');

    Route::resource(
        'documents',
        App\Http\Controllers\DocumentController::class
    );

});

require __DIR__.'/auth.php';
