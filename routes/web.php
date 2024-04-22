<?php

use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\StaticController;
use App\Http\Controllers\DevicesController; 
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;


Route::get('/', [StaticController::class, 'index'])->name('home.index');

Route::get('/about', [StaticController::class, 'about'])->name('home.about');

Route::get('/contact', [StaticController::class, 'contact'])->name('home.contact');

Route::get('/portfolio', [StaticController::class, 'portfolio'])->name('home.portfolio');

Route::resource('devices', DevicesController::class);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'loginAuthenticate'])->name('login.authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
