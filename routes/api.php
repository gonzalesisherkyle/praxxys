<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\VideoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ADMIN
Route::get('/view', [App\Http\Controllers\ProductController::class, 'view'])->name('view');
Route::get('/show/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('show');
Route::get('/products',[App\Http\Controllers\ProductController::class, 'products'])->name('product');
Route::get('/create',[App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::get('/edit/{id}',[App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
Route::post('/updated',[App\Http\Controllers\ProductController::class, 'updated'])->name('updated');
Route::post('/store',[App\Http\Controllers\ProductController::class, 'store'])->name('store');
Route::get('/delete/{id}',[App\Http\Controllers\ProductController::class, 'delete'])->name('delete');

// Video Player
Route::get('/video', [App\Http\Controllers\VideoController::class, 'index'])->name('video');
