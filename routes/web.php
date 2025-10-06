<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::middleware(['auth','permission:view dashboard'])->group(function () {
        Route::get("/dashboard",  [DashboardController::class, 'index'])->name("dashboard");
        Route::get("/change-lang/{lang}", [DashboardController::class, 'changeLang'])->name("change-lang");
        Route::post("/logout", [LoginController::class, 'logout'])->name("logout");
        
        // users
        Route::resource("/users", UsersController::class);
        Route::post('/users/bulk-delete', [UsersController::class, 'bulkDelete'])->name('users.bulkDelete');

        // profile
        Route::resource("/profile", ProfileController::class);

        // admins
        Route::resource("/admins", AdminController::class);
        Route::post('/admins/bulk-delete', [AdminController::class, 'bulkDelete'])->name('admins.bulkDelete');

        // permissions
        Route::resource("/roles", RolesController::class);
        Route::post('/roles/bulk-delete', [RolesController::class, 'bulkDelete'])->name('roles.bulkDelete');


    });

    Route::get("/login", [LoginController::class, 'showLoginform']);
    Route::post("/login", [LoginController::class, 'login'])->name("login");
});
