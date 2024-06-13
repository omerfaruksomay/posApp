<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\TableController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('orderFood', [OrderController::class, 'orderFood'])->middleware('auth:sanctum');
Route::get('tables', [TableController::class, 'getTables']);
Route::get('categories', [CategoryController::class, 'getCategories']);
Route::get('menus/{category_id}', [MenuController::class, 'getMenus']);
Route::get('orders/{table_id}', [OrderController::class, 'getOrdersByTable']);

