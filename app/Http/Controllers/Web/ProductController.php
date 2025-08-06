<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function type()
    {
        $data = [
            'title' => 'Kategori Produk',
            'partial_title' => PartialController::title('Kategori Produk'),
            'type' => Type::all()
        ];
        
        return view('web.page.product.type', $data);
    }

    public function list(Request $request)
    {
        if($request->has('type')) {
           $product = Product::with('productType', 'productImage')
                ->where('status', 'published')
                ->whereHas('productType', function($query) use ($request) {
                    $query->where('slug', $request->get('type'));
                })
                ->orderBy('created_at', 'desc')
                ->paginate(9);
            
            if($product->isEmpty()) {
                return redirect()->route('web.not-found');
            }

            $type = Type::where('slug', $request->get('type'))->first();
            $partial_title = PartialController::title($type ? $type->name : 'Produk');

        }else if($request->has('search')) {
            $search = $request->get('search');
            $product = Product::with('productType', 'productImage')
                ->where('status', 'published')
                ->where(function($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('description', 'like', "%{$search}%");
                })
                ->orderBy('created_at', 'desc')
                ->paginate(9);

            if($product->isEmpty()) {
                return redirect()->route('web.not-found');
            }

            $partial_title = PartialController::title('Hasil Pencarian: ' . $search);
            
        } else {
            $product = Product::with('productType', 'productImage')
                ->where('status', 'published')
                ->orderBy('created_at', 'desc')
                ->paginate(9);

            $partial_title = PartialController::title('Daftar Produk');
        }

        $data = [
            'title' => 'Daftar Produk',
            'partial_title' => $partial_title,
            'product' => $product
        ];
        
        return view('web.page.product.list', $data);
    }

    public function detail($slug)
    {
        $product = Product::where(['slug' => $slug, 'status' => 'published']);
        if (!$product->exists()) {
            return redirect()->route('web.not-found');
        }
        $data = [
            'title' => 'Produk '.$product->first()->name,
            'partial_title' => PartialController::title($product->first()->name),
            'product' => $product->first()
        ];
        
        return view('web.page.product.detail', $data);
    }
}