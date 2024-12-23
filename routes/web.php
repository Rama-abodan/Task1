<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function (){
    Route::get("/" , [AuthController::class,"ShowLoginForm"])->name("login");
    Route::post("/" , [AuthController::class,"login"]);
    });
    
    Route::middleware("auth")->group(function(){
    Route::get('/post',[PostController::class , "index"])->name("posts.index");
    Route::get('/add' , [PostController::class , "create"])->name("posts.create");
    Route::post('/post', [PostController::class , "store"])->name("posts.store");
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/{post}',[PostController::class,"destroy"])->name("posts.destroy");
    Route::post("/logout" , [AuthController::class,"logout"])->name("logout");
    });

/* Route::resource('posts',PostController::class); */


Route::middleware("auth")->group(function() {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/add', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [PostController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});

