<?php

namespace App\Http\Controllers\Cms\Product;

use App\Helpers\NotifyHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'product_category' => ProductCategory::all(),
        ];

        return view('cms.page.product-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.page.product-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|unique:product_category,slug|max:150',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'slug', 'description']);
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('files', 'public');
        }

        ProductCategory::create($data);

        $notify = NotifyHelper::successfullyCreated();
        return redirect()->route('cms.product-category.index')->with('notify', $notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        if(!$productCategory) {
             $notify = NotifyHelper::notFound();
            return back()->with('notify', $notify);
        }
        
        $data = [
            'product_category' => $productCategory,
        ];

        return view('cms.page.product-category.update', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        if(!$productCategory) {
            $notify = NotifyHelper::notFound();
            return back()->with('notify', $notify);
        }

        $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'required|string|unique:product_category,slug,' . $productCategory->id . '|max:150',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'slug', 'description']);
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('files', 'public');
        }

        $productCategory->update($data);

        $notify = NotifyHelper::successfullyUpdated();
        return redirect()->route('cms.product-category.index')->with('notify', $notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        if(!$productCategory) {
            $notify = NotifyHelper::notFound();
            return back()->with('notify', $notify)->withInput();
        }

        // Check if there are products associated with this category
        if (Product::where('product_category', $productCategory->id)->exists()) {
            $notify = NotifyHelper::errorOccurred('Kategori produk ini masih memiliki produk terkait.');
            return back()->with('notify', $notify);
        }

        $productCategory->delete();
        
        $notify = NotifyHelper::successfullyDeleted();
        return redirect()->route('cms.product-category.index')->with('notify', $notify);
    }
}
