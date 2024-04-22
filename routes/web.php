<?php

use Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    // routes/web.php


    Route::view('/', 'welcome');
    Auth::routes();

    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');
    Route::get('/register/admin', 'RegisterController@showAdminRegisterForm');
    Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');

    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    Route::post('/login/writer', 'Auth\LoginController@writerLogin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
    Route::post('/register/writer', 'Auth\RegisterController@createWriter');

    Route::view('/home', 'home')->middleware('auth');
    Route::view('/admin', 'admin');
    Route::view('/writer', 'writer');


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Writer Posts
Route::prefix('writer')->middleware('auth:writer')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('writer.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('writer.posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('writer.posts.store');
});