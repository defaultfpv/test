<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckToken;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\MessageController;

// документация
Route::get('/dist', function () {
    return view('swagger.index');
});

// авторизация
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:token')->post('logout', [AuthController::class, 'logout']);
});

// Пользователи
Route::prefix('users')->group(function () {
    Route::middleware('auth:token')->get('me', [UsersController::class, 'me']);
    Route::middleware('auth:token')->get('', [UsersController::class, 'all']);
    Route::middleware('auth:token')->get('search', [UsersController::class, 'search']);
    Route::middleware('auth:token')->post('changerole/manager/{user_id}', [UsersController::class, 'changerole_manager']);
    Route::middleware('auth:token')->post('changerole/admin/{user_id}', [UsersController::class, 'changerole_admin']);
});

// каталог
Route::get('sections/{pet_id?}', [CatalogController::class, 'sections']);
Route::get('pets/{section_id?}', [CatalogController::class, 'pets']);

// товары
Route::middleware('auth:token')->post('product/{section_id}/{pet_id}', [ProductsController::class, 'create']);
Route::middleware('auth:token')->put('product/{product_id}', [ProductsController::class, 'update']);
Route::middleware('auth:token')->delete('product/{product_id}', [ProductsController::class, 'delete']);
Route::get('products/{section_id}/{pet_id}', [ProductsController::class, 'products']);
Route::get('product/{product_id}', [ProductsController::class, 'product']);
Route::get('related/products/{product_id}', [ProductsController::class, 'related']);

// корзина
Route::prefix('basket')->group(function () {
    Route::middleware('auth:token')->post('plus/variety/{id}', [BasketController::class, 'plus_variety']);
    Route::middleware('auth:token')->post('plus/product/{id}', [BasketController::class, 'plus_product']);
    Route::middleware('auth:token')->post('minus/variety/{id}', [BasketController::class, 'minus_variety']);
    Route::middleware('auth:token')->post('minus/product/{id}', [BasketController::class, 'minus_product']);
    Route::middleware('auth:token')->delete('delete/{position_id}', [BasketController::class, 'delete_position']);
    Route::middleware('auth:token')->delete('clean', [BasketController::class, 'clean_basket']);
    Route::middleware('auth:token')->get('', [BasketController::class, 'basket']);
});

// Сообщения
Route::middleware('auth:token')->get('messages', [MessageController::class, 'messages']);
Route::middleware('auth:token')->post('message', [MessageController::class, 'message']);

// изображения
Route::get('/images/{filename}', function ($filename) {
    $path = storage_path('app/public/images/' . $filename);
    if (!File::exists($path)) abort(404);
    return response()->file($path);
});
