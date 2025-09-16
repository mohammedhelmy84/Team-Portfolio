<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    // TEAM
    Route::get('/team', [TeamController::class, 'index'])->name('admin.team.index');
    Route::get('/team/create', [TeamController::class, 'create'])->name('admin.team.create');
    Route::post('/team/create', [TeamController::class, 'store'])->name('admin.team.store');
    Route::get('/team/{id}/edit', [TeamController::class, 'edit'])->name('admin.team.edit');
    Route::put('/team/{id}', [TeamController::class, 'update'])->name('admin.team.update');
    Route::delete('/team/{id}/delete', [TeamController::class, 'destroy'])->name('admin.team.delete');

    // PROJECTS
    Route::post('/projects', [DashboardController::class, 'storeProject'])->name('admin.projects.store');
    Route::delete('/projects/{id}', [DashboardController::class, 'deleteProject'])->name('admin.projects.delete');

    // SERVICES
    Route::post('/services', [DashboardController::class, 'storeService'])->name('admin.services.store');
    Route::delete('/services/{id}', [DashboardController::class, 'deleteService'])->name('admin.services.delete');

    // CONTACT
    Route::delete('/contacts/{id}', [DashboardController::class, 'deleteContact'])->name('admin.contacts.delete');
});