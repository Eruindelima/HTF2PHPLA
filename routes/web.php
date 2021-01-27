<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/save', [ProductController::class, 'save'])->name('product.save');
    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
    Route::get('product/order/{id}', [ProductController::class, 'productOrder'])->name('product.client.order');
    Route::get('client/order/list', [ProductController::class, 'orderByUser'])->name('product.client.order.index');
    Route::get('product/client/productShow/{id}', [ProductController::class, 'productShow'])->name('product.client.productShow');
});

Route::prefix('orders')->group(function () {
    Route::get('/sended', [ProductController::class, 'sendedOrder'])->name('order.sended');
    Route::get('/received', [ProductController::class, 'receivedOrder'])->name('order.received');
});

Route::prefix('profile')->group(function () {
    Route::get('/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/update', [UserController::class, 'update'])->name('profile.update');
});
