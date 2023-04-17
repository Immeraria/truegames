<?php

use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Auth::routes();

// каталог
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

// категории
Route::get('/catalog/categories', [CategoryController::class, 'index'])->name('catalog.category.index');
Route::post('/catalog/categories/store', [CategoryController::class, 'store'])->name('catalog.category.store');
Route::delete('/catalog/categories/{category}', [CategoryController::class, 'destroy'])->name('catalog.category.destroy');

// Продукты
Route::get('/catalog/create', [CatalogController::class, 'create'])->name('catalog.create');
Route::get('/catalog/products/{product}', [CatalogController::class, 'show'])->name('catalog.show');
Route::post('/catalog/products/store', [ProductController::class, 'store'])->name('catalog.product.store');
Route::get('/catalog/products/{product}/edit', [ProductController::class, 'edit'])->name('catalog.product.edit');
Route::patch('/catalog/products/{product}', [ProductController::class, 'update'])->name('catalog.product.update');
Route::delete('/catalog/products/{product}', [ProductController::class, 'destroy'])->name('catalog.product.destroy');

// Корзина
Route::get('/catalog/basket', [BasketController::class, 'index'])->name('basket.index');
Route::post('/catalog/basket/store', [BasketController::class, 'store'])->name('basket.store');
Route::delete('/catalog/basket/destroy', [BasketController::class, 'destroy'])->name('basket.destroy');

// Заказы
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders/store', [OrderController::class,'store'])->name('orders.store');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::patch('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');


// если включен то можно не видеть ошибки связанные с путями
// редирект если не валидные ссылки
// Route::any('{query}',
//     function() { return redirect('/catalog'); })
//     ->where('query', '.*');

