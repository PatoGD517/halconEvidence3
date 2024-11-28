<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\UserController;
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::put('/users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');

use App\Http\Controllers\OrderController;
Route::get('/order/search', [OrderController::class, 'search'])->name('order.search');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::put('/orders/{order}/status', [OrderController::class, 'changeStatus'])->name('orders.changeStatus');
Route::delete('/orders/{order}', [OrderController::class, 'delete'])->name('orders.delete');
Route::get('/orders/archived', [OrderController::class, 'archived'])->name('orders.archived');
Route::put('/orders/{order}/restore', [OrderController::class, 'restore'])->name('orders.restore');

Route::get('/test-orders', function () {
    return view('users.create'); //for testing and directly previewing views
});