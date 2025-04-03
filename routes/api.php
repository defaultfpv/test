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

// информация о пользователях
Route::prefix('users')->group(function () {
    Route::middleware('auth:token')->get('me', [UsersController::class, 'me']);
});

// каталог
Route::get('sections/{pet_id?}', [CatalogController::class, 'sections']);
Route::get('pets/{section_id?}', [CatalogController::class, 'pets']);

// товары
Route::middleware('auth:token')->post('product/{section_id}/{pet_id}', [ProductsController::class, 'create_product']);
Route::get('products/{section_id}/{pet_id}', [ProductsController::class, 'products']);

// изображения
Route::get('/images/{filename}', function ($filename) {
    $path = storage_path('app/public/images/' . $filename);
    if (!File::exists($path)) abort(404);
    return response()->file($path);
});
