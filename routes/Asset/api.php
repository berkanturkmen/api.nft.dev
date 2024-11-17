<?php

use App\Http\Controllers\Asset\AssetController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'assets',
    'as' => 'assets.',
], function () {
    Route::get('/', [AssetController::class, 'index'])->name('index');
    Route::post('/', [AssetController::class, 'store'])->name('store');
    Route::get('/{id}', [AssetController::class, 'show'])->name('show');
    Route::put('/{id}', [AssetController::class, 'update'])->name('update');
    Route::delete('/{id}', [AssetController::class, 'destroy'])->name('destroy');
});
