<?php


use App\Http\Controllers\backend\IndexController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', [ IndexController::class, 'index' ])->name('dashboard');
