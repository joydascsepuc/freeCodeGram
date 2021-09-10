<?php

use App\Mail\newUserRegistraionMail;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);

Auth::routes();

Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.index');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');


Route::get('/p/create',[App\Http\Controllers\PostsController::class, 'create']);
Route::post('/p',[App\Http\Controllers\PostsController::class, 'store']);
Route::get('/p/{id}',[App\Http\Controllers\PostsController::class, 'show']);

Route::post('/follow/{user}', [App\Http\Controllers\FollowsController::class, 'store']);

Route::get('/email', function(){
    return new newUserRegistraionMail();
});