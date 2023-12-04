<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
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
    Route::get('/favoriteContact{id}', [ContactController::class, 'FavoriteContact']);
    Route::get('/unFavoriteContact{id}', [ContactController::class, 'UnFavoriteContact']);

    // Favorite management
    Route::get('/fav', [ContactController::class, 'FavoritePageView'])->name('fav.view');

    // Single Contact management
    Route::get('/singleContact{id}', [ContactController::class, 'SingleContactView'])->name('single.contact');
    Route::get('/viewDestination/{district}', [ContactController::class, 'ViewDistrict']);
    Route::post('/deleteSinContact', [ContactController::class, 'DeleteSinContact'])->name('delete.sincontact');

    // Search
    Route::post('/search', [SearchController::class, 'search']);

});


