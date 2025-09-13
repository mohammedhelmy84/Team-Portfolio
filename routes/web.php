<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio.index');
})->name('home');


Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
