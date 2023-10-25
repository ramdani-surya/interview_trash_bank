<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TrashTypeController;
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

Route::prefix('/auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::middleware('auth')->group(function () {
    Route::resource('trash-type', TrashTypeController::class)->only('index', 'store');
    Route::put('trash-types/{trashType}/update', [TrashTypeController::class, 'update'])->name('trash_type.update');
    Route::get('trash-types/{trashType}/destroy', [TrashTypeController::class, 'destroy'])->name('trash_type.destroy');
});
