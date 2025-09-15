<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    // TEAM
    Route::post('/team', [DashboardController::class, 'storeTeam'])->name('admin.team.store');
    Route::delete('/team/{id}', [DashboardController::class, 'deleteTeam'])->name('admin.team.delete');

    // PROJECTS
    Route::post('/projects', [DashboardController::class, 'storeProject'])->name('admin.projects.store');
    Route::delete('/projects/{id}', [DashboardController::class, 'deleteProject'])->name('admin.projects.delete');

    // SERVICES
    Route::post('/services', [DashboardController::class, 'storeService'])->name('admin.services.store');
    Route::delete('/services/{id}', [DashboardController::class, 'deleteService'])->name('admin.services.delete');

    // CONTACT
    Route::delete('/contacts/{id}', [DashboardController::class, 'deleteContact'])->name('admin.contacts.delete');
});