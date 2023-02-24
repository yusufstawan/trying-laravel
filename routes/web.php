<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TemplateController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('post', PostController::class);
Route::put('post/{id}/publish', [PostController::class, 'publish'])->name('post.publish');
Route::put('post/{id}/unpublish', [PostController::class, 'unpublish'])->name('post.unpublish');

Route::get('template', [TemplateController::class, 'index'])->name('template.index');
