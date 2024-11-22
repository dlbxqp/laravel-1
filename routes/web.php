<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactsController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');

Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/post/{post}', [PostController::class, 'update'])->name('post.update');

Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.delete');
