<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
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

// Route::get('/contact', function () {
//     return view('pages.contactView');
// })->name('contact.view');

Route::get('/singleContact', function () {
    return view('pages.singleContact');
})->name('single.contact');

// Route::get('/category', function () {
//     return view('pages.categoryView');
// })->name('category.view');

Route::get('/fav', function () {
    return view('pages.favView');
})->name('fav.view');
















// Example of how you can define routes for email verification
Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function () {
    // Your routes that require email verification
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Category management
    // View Categories Section Page
    Route::get('/category', [CategoryController::class, 'CategoryPageView'])->name('category.view');
    Route::post('/addCategory', [CategoryController::class, 'AddCategory'])->name('add.category');
    Route::post('/editCategory', [CategoryController::class, 'EditCategory'])->name('edit.category');
    Route::post('/deleteCategory', [CategoryController::class, 'DeleteCategory'])->name('delete.category');

    // Contact management
    Route::get('/contact', [ContactController::class, 'ContactPageView'])->name('contact.view');
    Route::post('/addContact', [ContactController::class, 'AddContact'])->name('add.contact');
    Route::post('/editContact', [ContactController::class, 'EditContact'])->name('edit.contact');
    Route::post('/deleteContact', [ContactController::class, 'DeleteContact'])->name('delete.contact');


});


