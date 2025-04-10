<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductsController;

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
    Route::middleware('auth:token')->post('changerole/{user_id}', [UsersController::class, 'changerole']);
});

// каталог
Route::get('sections/{pet_id?}', [CatalogController::class, 'sections']);
Route::get('pets/{section_id?}', [CatalogController::class, 'pets']);

// товары
Route::middleware('auth:token')->post('product/{section_id}/{pet_id}', [ProductsController::class, 'create']);
Route::middleware('auth:token')->delete('product/{product_id}', [ProductsController::class, 'delete']);
Route::get('products/{section_id}/{pet_id}', [ProductsController::class, 'products']);
Route::get('product/{product_id}', [ProductsController::class, 'product']);
Route::get('related/products/{product_id}', [ProductsController::class, 'related']);

// изображения
Route::get('/images/{filename}', function ($filename) {
    $path = storage_path('app/public/images/' . $filename);
    if (!File::exists($path)) abort(404);
    return response()->file($path);
});

// корзина
Route::prefix('users')->group(function () {
    Route::middleware('auth:token')->get('me', [UsersController::class, 'me']);
});

