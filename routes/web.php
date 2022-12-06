<?php

use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('timeline',TimelineController::class)->name('timeline');
    Route::post('status',[StatusController::class,'store'])->name('statuses.store');

    Route::get('explore', ExploreUserController::class)->name('users.index');

    Route::prefix('profile')->group(function(){
        Route::get('{user}/{following}',[FollowingController::class, 'index'])->name('following.index');
        Route::post('{user}',[FollowingController::class, 'store'])->name('following.store');

        Route::get('{user}',ProfileInformationController::class)->name('profile.user')->withoutMiddleware('auth');
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
