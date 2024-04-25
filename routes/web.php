<?php

use App\Http\Controllers\Cashier\CashierController;
use App\Http\Controllers\management\CategoryController;
use App\Http\Controllers\Management\MenuController;
use App\Http\Controllers\Management\TableController;
use App\Http\Controllers\management\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Report\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'VerifyAdmin'])->group(function () {

    //management routes
    Route::get('/management', function () {
        return view('management.index');
    })->name('management');
    Route::resource('/management/category', CategoryController::class);
    Route::resource('/management/menu', MenuController::class);
    Route::resource('/management/table', TableController::class);
    Route::resource('/management/user', UserController::class);


    //reports routes
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/report/show', [ReportController::class, 'show']);



});

Route::middleware(['auth'])->group(function () {
    //cashier routes
    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier');
    Route::get('/cashier/showReceipt/{sale_id}', [CashierController::class, 'showReceipt']);
    Route::get('/cashier/getMenuByCategory/{category_id}', [CashierController::class, 'getMenuByCategory']);
    Route::get('/cashier/getTable', [CashierController::class, 'getTables']);
    Route::get('/cashier/getSaleDetailsByTable/{table_id}', [CashierController::class, 'getSaleDetailsByTable']);
    Route::post('/cashier/orderFood', [CashierController::class, 'orderFood']);
    Route::post('/cashier/confirmOrderStatus', [CashierController::class, 'confirmOrderStatus']);
    Route::post('/cashier/deleteSaleDetail', [CashierController::class, 'deleteSaleDetail']);
    Route::post('/cashier/savePayment', [CashierController::class, 'savePayment']);


});



require __DIR__ . '/auth.php';
