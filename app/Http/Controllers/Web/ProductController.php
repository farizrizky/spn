<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productCategory()
    {
        $data = [
            'title' => 'Kategori Produk',
            'partial_title' => PartialController::title('Kategori Produk'),
            'product_category' => ProductCategory::all()
        ];
        
        return view('web.page.product.category', $data);
    }

    public function productList($slug)
    {
        $productCategory = ProductCategory::where('slug', $slug)->first();
        if (!$productCategory) {
            return redirect()->route('web.not-found');
        }

        $product = Product::with('productImage', 'productCategory')->whereHas('productCategory', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->where('status', 'published')->orderBy('created_at', 'desc');


        $data = [
            'title' => 'Daftar Produk',
            'partial_title' => PartialController::title('Daftar Produk ' . $productCategory->name),
            'product' => $product->paginate(10)
        ];
        
        return view('web.page.product.list', $data);
    }

    public function productDetail($slug)
    {
        $product = Product::where(['slug' => $slug, 'status' => 'published']);
        if (!$product->exists()) {
            return redirect()->route('web.not-found');
        }
        $data = [
            'title' => 'Detail Produk',
            'partial_title' => PartialController::title('Detail Produk'),
            'product' => $product->first()
        ];
        
        return view('web.page.product.detail', $data);
    }
}