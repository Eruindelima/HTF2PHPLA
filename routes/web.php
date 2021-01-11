<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('create.product');
    Route::post('/save', [ProductController::class, 'save'])->name('save.product');
    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::post('update/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete.product');
});
