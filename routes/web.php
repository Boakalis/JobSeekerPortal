<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Livewire\Admin\JobList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login',[LoginController::class,'index'])->name('login.index');
Route::post('/login',[LoginController::class,'loginAttempt'])->name('login.attempt');
Route::resource('/register',RegisterController::class);
Route::middleware('auth')->group(function(){
    Route::view('/change-password','web.change-password')->name('change-password.index');
    Route::post('/change-password',[ProfileController::class,'changePassword'])->name('password.change');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('/get-resume',[ProfileController::class,'getResume'])->name('get.resume');
    Route::get('/profile',[ProfileController::class,'profile'])->name('profile');
    Route::post('/profile',[ProfileController::class,'updateProfile'])->name('profile.update');
});
Route::view('/','web.home')->name('home');
Route::prefix('admin')->as('admin.')->group(function(){
    Route::view('/login','admin.login')->name('login.index');
    Route::post('/login',[AdminController::class,'loginAttempt'])->name('login.attempt');

    Route::middleware('admin')->group(function(){
        Route::view('/dashboard','admin.dashboard')->name('dashboard');
        Route::get('/logout',[AdminController::class,'logout'])->name('logout');
        Route::get('/profiles',JobList::class)->name('profiles');
        Route::get('/get-resume/{id}',[AdminController::class,'getResume'])->name('get.resume');
    });
});

