<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'pages.home');
Route::view('/about', 'pages.about');
Route::view('/projects', 'pages.projects');
Route::view('/contact', 'pages.contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
