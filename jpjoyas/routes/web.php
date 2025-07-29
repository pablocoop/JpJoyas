<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\InfoContentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

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

Route::get('/run-migrations', function () {
    Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
    return 'Migraciones y seeders ejecutados correctamente.';
});

Route::get('/artisan-cache-clear', function () {
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    return 'Caches limpiadas';
});

Route::get('/log-test', function () {
    Log::error('Este es un error de prueba desde la ruta /log-test');
    abort(500, 'Error intencional para probar el log');
});

//DEV
Route::get('/crear-symlink', function () {
    $target = '/home3/jpjoyas/laravel/storage/app/public';
    $link = '/home3/jpjoyas/public_html/storage';

    if (file_exists($link)) {
        return 'Ya existe la carpeta o symlink en public_html/storage.';
    }

    if (symlink($target, $link)) {
        return 'Symlink creado exitosamente.';
    } else {
        return 'Fallo al crear el symlink.';
    }
});

// Ruta para limpiar cachés manualmente desde el navegador
// ⚠️ IMPORTANTE: Mantener comentada en producción, o restringir a admin ⚠️

Route::get('/clear-cache', function () {
    if (!Auth::check() || !Auth::user()->is_admin) {
        abort(403);
    }
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    return '✅ Cachés limpiados exitosamente.';
});

require __DIR__.'/auth.php';


