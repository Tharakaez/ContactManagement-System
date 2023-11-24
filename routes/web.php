<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/contact', function () {
    return view('pages.contactView');
})->name('contact');

// Example of how you can define routes for email verification
Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function () {
    // Your routes that require email verification
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


