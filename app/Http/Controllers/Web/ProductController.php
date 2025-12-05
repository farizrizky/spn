<?php

namespace App\Http\Controllers\Web;

use App\Helpers\DataHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all()
    {
        $product = Product::with('productType', 'productImage')
            ->where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $data = [
            'title' => 'Daftar Produk - PT. Sindo Prima Niaga',
            'partial_title' => PartialController::title('Daftar Produk'),
            'product' => $product
        ];
        
        return view('web.page.product.list', $data);
    }

    public function type()
    {
        $data = [
            'title' => 'Kategori Produk - PT. Sindo Prima Niaga',
            'partial_title' => PartialController::title('Kategori Produk'),
            'type' => Type::all()
        ];
        
        return view('web.page.product.type', $data);
    }

    public function productType($slug)
    {
        $type = Type::where('slug', $slug);
        if (!$type->exists()) {
            return redirect()->route('web.not-found');
        }
        
        $product = Product::with('productType', 'productImage')
            ->where('status', 'published')
            ->whereHas('productType', function($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $data = [
            'title' => 'Kategori Produk - '.$type->first()->name,
            'partial_title' => PartialController::title($type->first()->name),
            'product' => $product
        ];
        
        return view('web.page.product.list', $data);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $product = Product::with('productType', 'productImage')
            ->where('status', 'published')
            ->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $data = [
            'title' => 'Hasil Pencarian: ' . $search,
            'partial_title' => PartialController::title('Hasil Pencarian: ' . $search),
            'product' => $product
        ];
        
        return view('web.page.product.list', $data);
    }

    public function detail(Request $request,$slug)
    {
        $product = Product::where(['slug' => $slug, 'status' => 'published']);
        if (!$product->exists()) {
            return redirect()->route('web.not-found');
        }
        $data = [
            'title' => 'Produk - '.$product->first()->name,
            'meta_description' => $product->first()->meta_description,
            'partial_title' => PartialController::title($product->first()->name),
            'product' => $product->first()
        ];

        $url = route('web.product-detail', ['slug' => $slug]);
        if (!DataHelper::urlVisited($request->ip(), $url)) {
            $product->first()->increment('view_count');
        }

        return view('web.page.product.detail', $data);
    }
}