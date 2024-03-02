<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

// Be carefull with the order we we put our routes and stick to the naming convention of the routes Resource{Restful HTTP}

Route::post('follow/{user}', [App\Http\Controllers\FollowsController::class, 'store'])->name('profile.store');


Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create'])->name('profile.create');
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store'])->name('profile.store');
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('profile.show');
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
