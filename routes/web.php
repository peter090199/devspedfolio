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
Route::get('/download-cv', function () {
    return response()->streamDownload(function () {
        echo file_get_contents('https://cdn.myracepics.com/laravel-s3/devespedfolio/resume.pdf');
    }, 'PEDRO-LAPASARAN-CV.pdf');
});