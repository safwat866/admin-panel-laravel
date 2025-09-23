<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get("/dashboard",  [DashboardController::class, 'index'])->name("dashboard");
        Route::get("/change-lang/{lang}", [DashboardController::class, 'changeLang'])->name("change-lang");
        Route::post("/logout", [LoginController::class, 'logout'])->name("logout");
        
        // users
        Route::resource("/users", UsersController::class);
    });

    Route::get("/login", [LoginController::class, 'showLoginform']);
    Route::post("/login", [LoginController::class, 'login'])->name("login");
});
