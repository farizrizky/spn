<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Web\StaticController::class, 'home'])->name('web.home');
Route::get('/profil', [App\Http\Controllers\Web\StaticController::class, 'profile'])->name('web.profile');
Route::get('/visi-misi', [App\Http\Controllers\Web\StaticController::class, 'visionMission'])->name('web.vision-mission');
Route::get('/mitra-bisnis', [App\Http\Controllers\Web\StaticController::class, 'bussinessPartner'])->name('web.bussiness-partner');
Route::get('/penghargaan', [App\Http\Controllers\Web\StaticController::class, 'award'])->name('web.award');
Route::get('/layanan', [App\Http\Controllers\Web\StaticController::class, 'service'])->name('web.service');
Route::get('/lube-truck', [App\Http\Controllers\Web\StaticController::class, 'lubeTruck'])->name('web.lube-truck');
Route::get('/lube-station', [App\Http\Controllers\Web\StaticController::class, 'lubeStation'])->name('web.lube-station');
Route::get('/kontak', [App\Http\Controllers\Web\StaticController::class, 'contact'])->name('web.contact');

Route::get('/kategori-produk', [App\Http\Controllers\Web\ProductController::class, 'productCategory'])->name('web.product-category');
Route::get('/daftar-produk/{product_category_slug}', [App\Http\Controllers\Web\ProductController::class, 'productList'])->name('web.product-list');
Route::get('/produk/{product_slug}', [App\Http\Controllers\Web\ProductController::class, 'productDetail'])->name('web.product-detail');

Route::get('/not-found', [App\Http\Controllers\Web\StaticController::class, 'notFound'])->name('web.not-found');
Route::fallback(function () {
    return redirect()->route('web.not-found');
});
