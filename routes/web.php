<?php

use App\Http\Controllers\User\ProfileController;
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

Route::view('/',"pages.home");

Route::middleware("auth")->group(function(){
    Route::controller(ProfileController::class)->prefix("/profile")->group(function(){
        Route::view('/',"pages.profile");
        Route::post("/save","save")->name("profile.save");
    });
});
Auth::routes();
