<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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


// show all
Route::get('/', [ListingController::class, 'index']);

// show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');


// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// Edit Listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');


// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');


// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// show Register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');


// Create User
Route::post('/users', [UserController::class, 'store']);


// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->name('login')->middleware('auth');


// show Log User in
Route::get('/login', [UserController::class, 'login'])->middleware('guest');


//  Log User in
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


//  Manage Listings
Route::get('/manage', [ListingController::class, 'manage'])->middleware('auth');