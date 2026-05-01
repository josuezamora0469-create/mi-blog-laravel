<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Blog público
Route::get('/', [PostController::class, 'index']);
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show');

// Comentarios
Route::post('/comentarios', [CommentController::class, 'store'])->name('comments.store');

// Dashboard de Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Administración
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('/posts', [PostController::class, 'indexAdmin'])->name('admin.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';