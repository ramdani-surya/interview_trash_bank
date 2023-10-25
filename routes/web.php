<?php

use App\Http\Controllers\Client\TransactionController;
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
    return redirect()->route('transaction.index');
});

Route::prefix('/transaction')->name('transaction.')->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('index');
    Route::post('store', [TransactionController::class, 'store'])->name('store');
});
