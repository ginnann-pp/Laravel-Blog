<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [PostController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
    // posts関係ルート
    Route::get('/post/create', [PostController::class, 'create'])
    ->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])
    ->name('post.store');

    Route::get('/post/show_user/{post}', [PostController::class, 'show_user'])
        ->name('post.show_user');

        // 編集ルート
    Route::get('/post/edit', [PostController::class, 'edit'])
        ->name('post.edit');
    Route::get('/post/{post}/update', [PostController::class, 'show_update'])
        ->name('post.update');
    Route::patch('/post/{post}/update_post', [PostController::class, 'update_post'])
        ->name('post.update_post');
    Route::delete('/post/{post}/destroy', [PostController::class, 'destroy'])
        ->name('post.destroy')
        ->where('post', '[0-9]+');

});

require __DIR__.'/auth.php';
