<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get("/dashboard",  [DashboardController::class, 'index'])->name("dashboard");
    Route::get("/change-lang/{lang}", [DashboardController::class, 'changeLang'])->name("change-lang");
});