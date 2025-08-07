<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Web\StaticController::class, 'home'])->name('web.home');
Route::get('/profil', [App\Http\Controllers\Web\StaticController::class, 'profile'])->name('web.profile');
Route::get('/visi-misi', [App\Http\Controllers\Web\StaticController::class, 'visionMission'])->name('web.vision-mission');
Route::get('/consignment-project', [App\Http\Controllers\Web\StaticController::class, 'consignmentProject'])->name('web.consignment-project');
Route::get('/penghargaan', [App\Http\Controllers\Web\StaticController::class, 'award'])->name('web.award');
Route::get('/layanan-distribusi', [App\Http\Controllers\Web\StaticController::class, 'distributionService'])->name('web.distribution-service');
Route::get('/lube-truck', [App\Http\Controllers\Web\StaticController::class, 'lubeTruck'])->name('web.lube-truck');
Route::get('/lube-station', [App\Http\Controllers\Web\StaticController::class, 'lubeStation'])->name('web.lube-station');
Route::get('/kontak', [App\Http\Controllers\Web\StaticController::class, 'contact'])->name('web.contact');

Route::get('/produk', [App\Http\Controllers\Web\ProductController::class, 'all'])->name('web.product');
Route::get('/produk/kategori', [App\Http\Controllers\Web\ProductController::class, 'type'])->name('web.product-type');
Route::get('/produk/kategori/{slug}', [App\Http\Controllers\Web\ProductController::class, 'productType'])->name('web.product-type-detail');
Route::get('/produk/{slug}', [App\Http\Controllers\Web\ProductController::class, 'detail'])->name('web.product-detail');
Route::get('/produk/pencarian', [App\Http\Controllers\Web\ProductController::class, 'search'])->name('web.product-search');

Route::get('/informasi', [App\Http\Controllers\Web\BlogController::class, 'all'])->name('web.blog');
Route::get('/informasi/kategori/{slug}', [App\Http\Controllers\Web\BlogController::class, 'category'])->name('web.blog-category');
Route::get('/informasi/tag/{slug}', [App\Http\Controllers\Web\BlogController::class, 'tag'])->name('web.blog-tag');
Route::get('/informasi/pencarian', [App\Http\Controllers\Web\BlogController::class, 'search'])->name('web.blog-search');
Route::get('/informasi/{slug}', [App\Http\Controllers\Web\BlogController::class, 'detail'])->name('web.blog-detail');

Route::post('/contact-form/submit', [App\Http\Controllers\Web\ContactFormController::class, 'store'])->name('web.contact-form.store');
Route::get('/not-found', [App\Http\Controllers\Web\StaticController::class, 'notFound'])->name('web.not-found');

Route::fallback(function () {
    return redirect()->route('web.not-found');
});
