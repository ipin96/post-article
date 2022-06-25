<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PreviewController;
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

Route::get('/', function () {
    return view('layouts.app');
});

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('store', [PostController::class, 'store'])->name('posts.store');
    Route::put('{id}/update', [PostController::class, 'update'])->name('posts.update');
    Route::delete('{id}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
});
Route::get('preview', [PreviewController::class, 'index'])->name('posts.preview');
