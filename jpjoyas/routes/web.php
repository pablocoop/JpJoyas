<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\InfoContentController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/blog/create', [BlogPostController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogPostController::class, 'store'])->name('blog.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/contenido/{section}/editar', [InfoContentController::class, 'edit'])
        ->name('info.edit');
    Route::post('/contenido/{section}/actualizar', [InfoContentController::class, 'update'])
        ->name('info.update');
});

// Blog trix upload route 
Route::post('/trix-upload', [\App\Http\Controllers\TrixUploadController::class, 'upload'])->name('trix.upload');

// Blog index route
Route::get('/blog', [\App\Http\Controllers\BlogPostController::class, 'index'])->name('blog.index');

// Blog posts routes
Route::resource('blog', BlogPostController::class); //->middleware('auth');

require __DIR__.'/auth.php';
