<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('index');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

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
    Route::delete('/team/{id}/delete', [TeamController::class, 'destroy'])->name('admin.team.destroy');

    // PROJECTS
    Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects/create', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{id}/delete', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');


    // SERVICES
    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services/create', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{id}/delete', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    // CONTACT
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
});

Route::get('/admin/notifications', [ContactController::class, 'notifications'])
    ->name('admin.notifications');