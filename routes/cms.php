<?php

use App\Http\Controllers\Cms\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('panel')->group(function () {

    Route::get('/login', [\App\Http\Controllers\Cms\Auth\LoginController::class, 'index'])->name('cms.login');
    Route::post('/login', [\App\Http\Controllers\Cms\Auth\LoginController::class, 'authenticate'])->name('cms.login');

    Route::middleware('auth')->group(function () {
        Route::get('/', [\App\Http\Controllers\Cms\DashboardController::class, 'index'])->name('cms.dashboard');
        Route::get('/dashboard', [\App\Http\Controllers\Cms\DashboardController::class, 'index'])->name('cms.dashboard.index');

        Route::get('/logout', [\App\Http\Controllers\Cms\Auth\LogoutController::class, 'logout'])->name('cms.logout');


        Route::get('/kategori-produk', [\App\Http\Controllers\Cms\Product\ProductCategoryController::class, 'index'])->name('cms.product-category.index');
        Route::get('/kategori-produk/input', [\App\Http\Controllers\Cms\Product\ProductCategoryController::class, 'create'])->name('cms.product-category.create');
        Route::post('/kategori-produk/tambah', [\App\Http\Controllers\Cms\Product\ProductCategoryController::class, 'store'])->name('cms.product-category.store');
        Route::get('/kategori-produk/edit/{productCategory}', [\App\Http\Controllers\Cms\Product\ProductCategoryController::class, 'edit'])->name('cms.product-category.edit');
        Route::post('/kategori-produk/update/{productCategory}', [\App\Http\Controllers\Cms\Product\ProductCategoryController::class, 'update'])->name('cms.product-category.update');
        Route::get('/kategori-produk/hapus/{productCategory}', [\App\Http\Controllers\Cms\Product\ProductCategoryController::class, 'destroy'])->name('cms.product-category.delete');

        Route::get('/produk', [\App\Http\Controllers\Cms\Product\ProductController::class, 'index'])->name('cms.product.index');
        Route::get('/produk/input', [\App\Http\Controllers\Cms\Product\ProductController::class, 'create'])->name('cms.product.create');
        Route::post('/produk/tambah', [\App\Http\Controllers\Cms\Product\ProductController::class, 'store'])->name('cms.product.store');
        Route::get('/produk/edit/{product}', [\App\Http\Controllers\Cms\Product\ProductController::class, 'edit'])->name('cms.product.edit');
        Route::post('/produk/update/{product}', [\App\Http\Controllers\Cms\Product\ProductController::class, 'update'])->name('cms.product.update');
        Route::get('/produk/hapus/{product}', [\App\Http\Controllers\Cms\Product\ProductController::class, 'destroy'])->name('cms.product.delete');
        
        Route::get('/produk/level-kualitas', [\App\Http\Controllers\Cms\Product\QualityLevelController::class, 'index'])->name('cms.quality-level.index');
        Route::get('/produk/level-kualitas/input', [\App\Http\Controllers\Cms\Product\QualityLevelController::class, 'create'])->name('cms.quality-level.create');
        Route::post('/produk/level-kualitas/tambah', [\App\Http\Controllers\Cms\Product\QualityLevelController::class, 'store'])->name('cms.quality-level.store');
        Route::get('/produk/level-kualitas/edit/{qualityLevel}', [\App\Http\Controllers\Cms\Product\QualityLevelController::class, 'edit'])->name('cms.quality-level.edit');
        Route::post('/produk/level-kualitas/update/{qualityLevel}', [\App\Http\Controllers\Cms\Product\QualityLevelController::class, 'update'])->name('cms.quality-level.update');
        Route::get('/produk/level-kualitas/hapus/{qualityLevel}', [\App\Http\Controllers\Cms\Product\QualityLevelController::class, 'destroy'])->name('cms.quality-level.delete');
        
        Route::get('/produk/spesifikasi-variable', [\App\Http\Controllers\Cms\Product\SpecificationVariableController::class, 'index'])->name('cms.specification-variable.index');
        Route::get('/produk/spesifikasi-variable/input', [\App\Http\Controllers\Cms\Product\SpecificationVariableController::class, 'create'])->name('cms.specification-variable.create');
        Route::post('/produk/spesifikasi-variable/tambah', [\App\Http\Controllers\Cms\Product\SpecificationVariableController::class, 'store'])->name('cms.specification-variable.store');
        Route::get('/produk/spesifikasi-variable/edit/{specificationVariable}', [\App\Http\Controllers\Cms\Product\SpecificationVariableController::class, 'edit'])->name('cms.specification-variable.edit');
        Route::post('/produk/spesifikasi-variable/update/{specificationVariable}', [\App\Http\Controllers\Cms\Product\SpecificationVariableController::class, 'update'])->name('cms.specification-variable.update');
        Route::get('/produk/spesifikasi-variable/hapus/{specificationVariable}', [\App\Http\Controllers\Cms\Product\SpecificationVariableController::class, 'destroy'])->name('cms.specification-variable.delete');

        Route::post('file/upload', [\App\Http\Controllers\Cms\Utility\FileManager::class, 'uploadFile'])->name('cms.file.upload');
    });

});