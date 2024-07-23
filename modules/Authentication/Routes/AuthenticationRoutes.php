<?php

use Illuminate\Support\Facades\Route;
use Modules\Authentication\app\Controllers\ProfileController;
use Modules\Home\Issue\Controllers\PostController as HomeIssueController;


//Route::prefix('/')->name('home.')->group(function (){
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//    require __DIR__.'/auth.php';
//});
