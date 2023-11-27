<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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

Route::get('/', [ItemController::class, 'index'])->name('items.all');
Route::prefix('/item')->group(function () {
    Route::post('/store', [ItemController::class, 'store'])->name('item.store');
    Route::put('/{id}', [ItemController::class, 'update'])->name('item.put');
    Route::delete('/{id}', [ItemController::class, 'delete'])->name('item.delete');
})->name('item');
