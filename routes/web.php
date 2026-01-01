<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dashboardController;

Route::get('/', function () {
    return redirect('dashboard');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('employer', \App\Http\Controllers\EmployerController::class);
    Route::resource('billing', \App\Http\Controllers\BillingController::class);
    Route::resource('ams', \App\Http\Controllers\AmsController::class);
    Route::post('/ams/import', [\App\Http\Controllers\AmsController::class, 'import'])
    ->name('ams.import');
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
