<?php

use App\Http\Controllers\Cms\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('panel')->group(function () {

    Route::get('/login', [\App\Http\Controllers\Cms\Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Cms\Auth\LoginController::class, 'authenticate'])->name('cms.login');

    Route::middleware('auth')->group(function () {
        Route::get('/', [\App\Http\Controllers\Cms\Dashboard\DashboardController::class, 'index'])->name('cms.dashboard');
        Route::get('/dashboard', [\App\Http\Controllers\Cms\Dashboard\DashboardController::class, 'index'])->name('cms.dashboard.index');
        Route::get('/logout', [\App\Http\Controllers\Cms\Auth\LogoutController::class, 'logout'])->name('cms.logout');


        Route::get('/kategori-produk', [\App\Http\Controllers\Cms\Product\TypeController::class, 'index'])->name('cms.type.index');
        Route::get('/kategori-produk/input', [\App\Http\Controllers\Cms\Product\TypeController::class, 'create'])->name('cms.type.create');
        Route::post('/kategori-produk/tambah', [\App\Http\Controllers\Cms\Product\TypeController::class, 'store'])->name('cms.type.store');
        Route::get('/kategori-produk/edit/{type}', [\App\Http\Controllers\Cms\Product\TypeController::class, 'edit'])->name('cms.type.edit');
        Route::post('/kategori-produk/update/{type}', [\App\Http\Controllers\Cms\Product\TypeController::class, 'update'])->name('cms.type.update');
        Route::get('/kategori-produk/hapus/{type}', [\App\Http\Controllers\Cms\Product\TypeController::class, 'destroy'])->name('cms.type.delete');

        Route::get('/produk', [\App\Http\Controllers\Cms\Product\ProductController::class, 'index'])->name('cms.product.index');
        Route::get('/produk/input', [\App\Http\Controllers\Cms\Product\ProductController::class, 'create'])->name('cms.product.create');
        Route::post('/produk/tambah', [\App\Http\Controllers\Cms\Product\ProductController::class, 'store'])->name('cms.product.store');
        Route::get('/produk/edit/{product}', [\App\Http\Controllers\Cms\Product\ProductController::class, 'edit'])->name('cms.product.edit');
        Route::post('/produk/update/{product}', [\App\Http\Controllers\Cms\Product\ProductController::class, 'update'])->name('cms.product.update');
        Route::get('/produk/hapus/{product}', [\App\Http\Controllers\Cms\Product\ProductController::class, 'destroy'])->name('cms.product.delete');

        Route::get('kategori-blog', [\App\Http\Controllers\Cms\Blog\BlogCategoryController::class, 'index'])->name('cms.blog-category.index');
        Route::get('kategori-blog/input', [\App\Http\Controllers\Cms\Blog\BlogCategoryController::class, 'create'])->name('cms.blog-category.create');
        Route::post('kategori-blog/tambah', [\App\Http\Controllers\Cms\Blog\BlogCategoryController::class, 'store'])->name('cms.blog-category.store');
        Route::get('kategori-blog/edit/{blogCategory}', [\App\Http\Controllers\Cms\Blog\BlogCategoryController::class, 'edit'])->name('cms.blog-category.edit');
        Route::post('kategori-blog/update/{blogCategory}', [\App\Http\Controllers\Cms\Blog\BlogCategoryController::class, 'update'])->name('cms.blog-category.update');
        Route::get('kategori-blog/hapus/{blogCategory}', [\App\Http\Controllers\Cms\Blog\BlogCategoryController::class, 'destroy'])->name('cms.blog-category.delete');

        Route::get('tag', [\App\Http\Controllers\Cms\Blog\TagController::class, 'index'])->name('cms.tag.index');
        Route::get('tag/input', [\App\Http\Controllers\Cms\Blog\TagController::class, 'create'])->name('cms.tag.create');
        Route::post('tag/tambah', [\App\Http\Controllers\Cms\Blog\TagController::class, 'store'])->name('cms.tag.store');
        Route::get('tag/edit/{tag}', [\App\Http\Controllers\Cms\Blog\TagController::class, 'edit'])->name('cms.tag.edit');
        Route::post('tag/update/{tag}', [\App\Http\Controllers\Cms\Blog\TagController::class, 'update'])->name('cms.tag.update');
        Route::get('tag/hapus/{tag}', [\App\Http\Controllers\Cms\Blog\TagController::class, 'destroy'])->name('cms.tag.delete');

        Route::get('blog', [\App\Http\Controllers\Cms\Blog\BlogController::class, 'index'])->name('cms.blog.index');
        Route::get('blog/input', [\App\Http\Controllers\Cms\Blog\BlogController::class, 'create'])->name('cms.blog.create');
        Route::post('blog/tambah', [\App\Http\Controllers\Cms\Blog\BlogController::class, 'store'])->name('cms.blog.store');
        Route::get('blog/edit/{blog}', [\App\Http\Controllers\Cms\Blog\BlogController::class, 'edit'])->name('cms.blog.edit');
        Route::post('blog/update/{blog}', [\App\Http\Controllers\Cms\Blog\BlogController::class, 'update'])->name('cms.blog.update');
        Route::get('blog/hapus/{blog}', [\App\Http\Controllers\Cms\Blog\BlogController::class, 'destroy'])->name('cms.blog.delete');

        Route::get('/form-kontak', [\App\Http\Controllers\Cms\Contact\ContactFormController::class, 'index'])->name('cms.contact-form.index');
        Route::get('/form-kontak/detail/{contactForm}', [\App\Http\Controllers\Cms\Contact\ContactFormController::class, 'show'])->name('cms.contact-form.detail');
        Route::get('/form-kontak/hapus/{contactForm}', [\App\Http\Controllers\Cms\Contact\ContactFormController::class, 'destroy'])->name('cms.contact-form.delete');
        Route::get('/form-kontak/status-dibaca/{contactForm}', [\App\Http\Controllers\Cms\Contact\ContactFormController::class, 'changeStatus'])->name('cms.contact-form.change-status');

        Route::get('/data-kontak', [\App\Http\Controllers\Cms\Contact\ContactDataController::class, 'index'])->name('cms.contact-data.index');
        Route::get('/data-kontak/input', [\App\Http\Controllers\Cms\Contact\ContactDataController::class, 'create'])->name('cms.contact-data.create');
        Route::post('/data-kontak/tambah', [\App\Http\Controllers\Cms\Contact\ContactDataController::class, 'store'])->name('cms.contact-data.store');
        Route::get('/data-kontak/edit/{contactData}', [\App\Http\Controllers\Cms\Contact\ContactDataController::class, 'edit'])->name('cms.contact-data.edit');
        Route::post('/data-kontak/update/{contactData}', [\App\Http\Controllers\Cms\Contact\ContactDataController::class, 'update'])->name('cms.contact-data.update');
        Route::get('/data-kontak/hapus/{contactData}', [\App\Http\Controllers\Cms\Contact\ContactDataController::class, 'destroy'])->name('cms.contact-data.delete');
        
        Route::get('/client', [\App\Http\Controllers\Cms\Client\ClientController::class, 'index'])->name('cms.client.index');
        Route::get('/client/input', [\App\Http\Controllers\Cms\Client\ClientController::class, 'create'])->name('cms.client.create');
        Route::post('/client/tambah', [\App\Http\Controllers\Cms\Client\ClientController::class, 'store'])->name('cms.client.store');
        Route::get('/client/edit/{client}', [\App\Http\Controllers\Cms\Client\ClientController::class, 'edit'])->name('cms.client.edit');
        Route::post('/client/update/{client}', [\App\Http\Controllers\Cms\Client\ClientController::class, 'update'])->name('cms.client.update');
        Route::get('/client/hapus/{client}', [\App\Http\Controllers\Cms\Client\ClientController::class, 'destroy'])->name('cms.client.delete');

        Route::post('file/ajax/load', [\App\Http\Controllers\Cms\Utility\FileManager::class, 'loadFiles'])->name('cms.file.load');
        Route::get('/file/{type?}', [\App\Http\Controllers\Cms\Utility\FileManager::class, 'index'])->name('cms.file');
        Route::get('/file/hapus/{file}', [\App\Http\Controllers\Cms\Utility\FileManager::class, 'destroy'])->name('cms.file.delete');
        Route::get('file/picker', [\App\Http\Controllers\Cms\Utility\FileManager::class, 'filePicker'])->name('cms.file.picker');
        Route::post('file/upload', [\App\Http\Controllers\Cms\Utility\FileManager::class, 'uploadFile'])->name('cms.file.upload');

        Route::get('/website-cover', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteCoverController::class, 'index'])->name('cms.website-cover.index');
        Route::get('/website-cover/input', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteCoverController::class, 'create'])->name('cms.website-cover.create');
        Route::post('/website-cover/tambah', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteCoverController::class, 'store'])->name('cms.website-cover.store');
        Route::get('/website-cover/edit/{websiteCover}', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteCoverController::class, 'edit'])->name('cms.website-cover.edit');
        Route::post('/website-cover/update/{websiteCover}', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteCoverController::class, 'update'])->name('cms.website-cover.update');
        Route::get('/website-cover/hapus/{websiteCover}', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteCoverController::class, 'destroy'])->name('cms.website-cover.delete');
        Route::post('/website-cover/simpan-urutan', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteCoverController::class, 'saveOrder'])->name('cms.website-cover.save-order');

        Route::get('/website-header', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteHeaderController::class, 'index'])->name('cms.website-header.index');
        Route::get('/website-header/input', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteHeaderController::class, 'create'])->name('cms.website-header.create');
        Route::post('/website-header/tambah', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteHeaderController::class, 'store'])->name('cms.website-header.store');
        Route::get('/website-header/edit/{websiteHeader}', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteHeaderController::class, 'edit'])->name('cms.website-header.edit');
        Route::post('/website-header/update/{websiteHeader}', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteHeaderController::class, 'update'])->name('cms.website-header.update');
        Route::get('/website-header/hapus/{websiteHeader}', [\App\Http\Controllers\Cms\WebsiteSetting\WebsiteHeaderController::class, 'destroy'])->name('cms.website-header.delete');
        
        Route::get('/static-page', [\App\Http\Controllers\Cms\WebsiteSetting\StaticController::class, 'index'])->name('cms.static.index');
        Route::get('/static-page/edit/{staticPage}', [\App\Http\Controllers\Cms\WebsiteSetting\StaticController::class, 'edit'])->name('cms.static.edit');
        Route::post('/static-page/update/{staticPage}', [\App\Http\Controllers\Cms\WebsiteSetting\StaticController::class, 'update'])->name('cms.static.update');

        Route::get('/visitor-log', [\App\Http\Controllers\Cms\Utility\VisitorLog::class, 'index'])->name('cms.visitor-log.index');  
    });

});