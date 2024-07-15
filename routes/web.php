<?php

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

use Botble\Base\Facades\AdminHelper;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdController;

    Route::get('/admin/ads', [AdController::class, 'index'])->name('ads.index');
    Route::get('/admin/ads/create', [AdController::class, 'create'])->name('ads.create');
    Route::post('/admin/ads', [AdController::class, 'store'])->name('ads.store');
    Route::get('/admin/ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
    Route::put('/admin/ads/{ad}', [AdController::class, 'update'])->name('ads.update');
    Route::delete('/admin/ads/{ad}', [AdController::class, 'destroy'])->name('ads.destroy');

    