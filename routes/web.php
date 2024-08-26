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

use App\Http\Controllers\PlayerController;
use Botble\Base\Facades\AdminHelper;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdController;
use App\Http\Controllers\VoteController;

    Route::get('/admin/ads', [AdController::class, 'index'])->name('ads.index');
    Route::get('/admin/ads/create', [AdController::class, 'create'])->name('ads.create');
    Route::post('/admin/ads', [AdController::class, 'store'])->name('ads.store');
    Route::get('/admin/ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
    Route::put('/admin/ads/{ad}', [AdController::class, 'update'])->name('ads.update');
    Route::delete('/admin/ads/{ad}', [AdController::class, 'destroy'])->name('ads.destroy');

    Route::get('/admin/players', [PlayerController::class, 'index'])->name('players.index');
    Route::get('/admin/players/create', [PlayerController::class, 'create'])->name('players.create');
    Route::post('/admin/players', [PlayerController::class, 'store'])->name('players.store');
    Route::get('/admin/players/{vote}/edit', [PlayerController::class, 'edit'])->name('players.edit');
    Route::put('/admin/players/{vote}', [PlayerController::class, 'update'])->name('players.update');
    Route::delete('/admin/players/{vote}', [PlayerController::class, 'destroy'])->name('players.destroy');

