<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Storefront\HomeController;
use App\Http\Controllers\Storefront\ProductController as StorefrontProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::get('/', HomeController::class)->name('home');
Route::get('/catalog/{product:slug}', [StorefrontProductController::class, 'show'])->name('catalog.show');

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('products', ProductController::class);
    });

// Contoh route untuk cek siapa yang login (hanya untuk debug, bisa dihapus nanti)
Route::get('/whoami', function (Request $request) {
    return $request->user();
})->middleware('auth');

require __DIR__.'/settings.php';
